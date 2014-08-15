<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scale = 1">
		<link href = "css/bootstrap.min.css" rel="stylesheet">
		<link href = "css/style.css" rel="stylesheet">
		<link rel= "shortcut icon" href="img/favicon.ico">
		<link href= "http://fonts.googleapis.com/css?family=Ubuntu|Open+Sans:400,600" rel="stylesheet" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/counter.css" rel="stylesheet">
		<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>
		<script>
			Parse.initialize("VHJSk9hmfDIoXsrRE3V7KWM6KHkncJwYfslUp10A", "qQzcr3LyCEAFf3yzxUmZh1LKy7EBmfxXw8vV6SMB");
		</script>
	</head>
	<title>
		TimeConnect - The end of manual time cards
	</title>
	<body data-spy="scroll" data-target="#navigation" id="home">
		<div class="navbar-wrapper" style="z-index: 30">
	      <div class="container">
	        <div class="navbar navbar-default navbar-static-top" role="navigation">
	          <div class="container">
	            <div class="navbar-header">
	              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	              </button>
	              <a href="index.php"><img src = "img/timeclock_logo_transparent.png" height = "30px" width = "206px" style= "margin-top: 12px"></a>
	            </div>
	            <div class="navbar-collapse collapse">
	              <ul class="nav navbar-nav navbar-right">
	                <li><a href="#">Home</a></li>
	                <li><a href="#">Message</a></li>
	                <li><a href="#about">Settings</a></li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Features</a></li>
	                    <li><a href="#">Communities</a></li>
	                    <li><a href="#">Add-ons</a></li>
	                    <li class="divider"></li>
	                    <li><a href="#">Support</a></li>
	                    <li><a href="#">Blog</a></li>
	                  </ul>
	                </li>
	                <li><button style = "margin-top: 9px" class="btn btn-default" onclick="logOut()">Log-out</button></li>
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="jumbotron" style="background-color: white; margin-top: 30px">	
      		<div class="container text-center">

      			<div id = "hours"></div>
      			<br>
      			<button class = "btn btn-primary" onclick= "showWeek()">Show Hours</button>
      			<br></br>
      			<div class = "jumbotron" id="showWeek"></div>

      			<div class="counter">
					<span class="digit-0">0</span>
					<span class="digit-0">0</span>
					<span class="digit-1">1</span>
					<span class="digit-5">5</span>
					<br/><h5 style = "color:white">Hours saved this pay period</h5>
				</div>
   				<div class="counter">
					<span class="digit-0">0</span>
					<span class="digit-0">0</span>
					<span class="digit-0">0</span>
					<span class="digit-5">5</span>
					<br/><h5 style = "color:white">Co-workers using TimeConnect</h5>
				</div>
   				<div class="counter">
					<span class="digit-2">2</span>
					<span class="digit-5">5</span>
					<span class="digit-8">8</span>
					<span class="digit-1">1</span>
					<br/><h5 style = "color:white">Money saved</h5>
				</div>
				
      		</div>
      	</div>

      	<div class="jumbotron" style="background-color: white; margin-top: -80px">	
      		<div class="container text-center">
				<p>Select Work Week</p>
				<select id="values123">
					<option value="07-03-2014 - 07-07-2014">07/03/2014 - 07/07/2014</option>
					<option value="06-26-2014 - 07-02-2014">06/26/2014 - 07/02/2014</option>
				</select>
				<button class = "btn btn-info" onclick="historyFunction()">Show History</button>
				<div id="history2"></div>
      		</div>
      	</div>

      	<script>
	    	var currentUser = Parse.User.current();
	    	var UN = currentUser.get("username");
	    	var FN = currentUser.get("firstName");
	    	var LN = currentUser.get("lastName");
	    	var EN = currentUser.get("employeeName");
	    	document.getElementById("hours").innerHTML = "<h3>Currently logged in as: </h3><h3>" + EN + "</h3>";
	    </script>

	    <script>
	    	var points2 = new Array(28); //store normal time as a string with AM/PM
			var militaryA1 = new Array(28); //store time as a whole number
			var stringTest = '';
			stringTest = stringTest + '<table>';

	    	function showWeek() {
				//set a counter variable and an if statment so if counter is more than 2 then clicking button wont display more history. 
				var totalHrs = 0;
				var timeSheet = Parse.Object.extend("TimeSheet");
				var query = new Parse.Query(timeSheet);
			
				query.equalTo("EmployeeName", EN);
				query.descending("Date");
				//query.limit(7); //7 days of the week most recent entries
				query.find({
					success: function(results) {
						//do something with the returned Parse.Object values
						//var object1 = results[0];

						stringTest = stringTest + ('<row><div class="col-md-4">Date</div><div class="col-md-4">Time In</div><div class="col-md-4">Time Out</div><row>');

						for (var i = 0; i < 7; i++) {
							var object = results[i];
							totalHrs = totalHrs + (object.get('timeOutMilitary') - object.get('timeInMilitary'));
							stringTest = stringTest + ('<row><div class="col-md-4">' + object.get('Date') + '</div><div class="col-md-4">' + object.get('timeIn') + '</div><div class="col-md-4">' + object.get('timeOut') + '</div><row>'); 
						}
						stringTest = stringTest + ('<br><h3 style="margin-bottom: -25px">Total Hours: ' + totalHrs/60.0 + '</h3>');
					
					},
					error: function(error) {
						alert("Error: User Does not exist");
					}
				});

				document.getElementById("showWeek").innerHTML = stringTest + "<br>";
				stringTest = '';
			}
			showWeek();
	    </script>

	    <script>
	    	var testing = '';
		//hi
		//history function works fine now.
		//need to make it into a table. 
	function historyFunction() {
		var a = document.getElementById("values123").value;
		var b = a.split(" ");
		var counter = 0;
		var totalHrs2 = 0;
		var timeSheet = Parse.Object.extend("TimeSheet");
		var query = new Parse.Query(timeSheet);
		query.equalTo("EmployeeName", EN);
		query.descending("Date");
		query.find({
			success: function(results) {
				testing = testing + ('<table border="1" cellspacing="1" cellpadding="5">');
				testing = testing + ('<tr><td>Date</td><td>Time In</td><td>Time Out</td><tr>');
				for (i = 0; i < results.length; i++) {
					var object = results[i];
						
					if (b[2] === object.get('Date')) {
						counter = 1;
						for (j = i; j < results.length; j++) { 
							var object2 = results[j];
							if (b[0] !== object2.get('Date')) {
								totalHrs2 = totalHrs2 + (object2.get('timeOutMilitary') - object2.get('timeInMilitary'));
								testing = testing + ('<tr><td>' + object2.get('Date') + '</td><td>' + object2.get('timeIn') + '</td><td>' + object2.get('timeOut') + '</td></tr>'); 
							} else {
								totalHrs2 = totalHrs2 + (object2.get('timeOutMilitary') - object2.get('timeInMilitary'));
								testing = testing + ('<tr><td>' + object2.get('Date') + '</td><td>' + object2.get('timeIn') + '</td><td>' + object2.get('timeOut') + '</td></tr>'); 
								break;
							}
						}
					}

					if (counter === 1) {
						break;
					}
				}

				testing = testing + ('<tr><td>' + "Total Hours:" + '</td><td>' + totalHrs2/60.0 + '</td><td></td></tr>');
				testing = testing + '</table>';

			},
			error: function(error) {
				alert("User does not exist");
			}
		});

		document.getElementById("history2").innerHTML = testing;
		testing = '';
		}

	    </script>

		<div id = "end" class = "navbar navbar-default" style="height: 250px">
            <div class = "container">
            	<div class="row">
        			<div class="col-lg-4">
        				<h4>Learn about TimeConnect</h4>
        				<a class = "footerColors" href = "#">Why TimeConnect?</a><br>
        				<a class = "footerColors" href = "#">Features</a><br>
        				<a class = "footerColors" href = "#">Pricing</a><br>
        				<a class = "footerColors" href = "#">Case Studies</a><br>
        				<a class = "footerColors" href = "#">Add-ons</a>
        			</div>
        			<div class="col-lg-4">
        				<h4>Partner with us</h4>
        				<a class = "footerColors" href = "#">Accountants and Bookkeepers</a><br>
        				<a class = "footerColors" href = "#">Financial Institutions</a><br>
        				<a class = "footerColors" href = "#">Developer Tools</a>
        			</div>
        			<div class="col-lg-4">
        				<h4>Contact & info</h4>
        				<a class = "footerColors" href = "#">About us</a><br>
        				<a class = "footerColors" href = "#">Blog</a><br>
        				<a class = "footerColors" href = "#">Media</a><br>
        				<a class = "footerColors" href = "#">Careers</a><br>
        				<a class = "footerColors" href = "#">Contact us</a>
        			</div>
        		</div>
        		<hr class="featurette-divider">
        		<p><a <a target="_blank" href="https://www.facebook.com/pages/TimeConnect/1532301686991646" style="color: #8F8F8F"><i class="fa fa-facebook fa-lg"></i> &nbsp;Facebook</a></p>
            	<a style="font-size: 14px" href = "#" class = "navbar-text pull-right">Terms of use</a>
                <p style="font-size: 14px" class = "navbar-text pull-left">&copy; 2014 - TimeConnect. All rights reserved.</p>
            </div>
      	</div>

      	<script>
    		var currentUser = Parse.User.current();
			if (currentUser) {
    			// do stuff with the user
    			console.log("success");
			} else {
    			// show the signup or login page
    			console.log("breach");
    			window.location.href = "login.php";
			}
    	</script>

    	<script>
    		function logOut(){
    			Parse.User.logOut();
				var currentUser = Parse.User.current();
				window.location.href = "index.php";
    		}
    	</script>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-klagRI08vJ54c1emqvfH7M0s9Gz5b_Q"></script>
		<script src="js/d3.min.js" charset="utf-8"></script>-->
		<script src="js/bootstrap.min.js"></script>
    	<!--<script src="js/d3js-google-maps.js"></script>
    	<script src="//cdn.embedly.com/widgets/platform.js"></script>-->

	    <script>
	      $("#navigation ul li a[href^='#']").on('click', function(e) {
	        // prevent default anchor click behavior
	        e.preventDefault();
	        // store hash
	        var hash = this.hash;
	        // animate
	        $('html, body').animate({
	          scrollTop: $(this.hash).offset().top
	        }, 300, function(){
	          // when done, add hash to url
	          // (default click behaviour)
	          window.location.hash = hash;
	        });
	      });
	    </script>
	    </body>
</html>