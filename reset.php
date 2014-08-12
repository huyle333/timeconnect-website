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
	                <li><a href="#">Small Businesses</a></li>
	                <li><a href="#about">Accountants and Bookkeepers</a></li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Features</a></li>
	                    <li><a href="#">Pricing</a></li>
	                    <li><a href="#">Add-ons</a></li>
	                    <li class="divider"></li>
	                    <li><a href="#">Support</a></li>
	                    <li><a href="#">Blog</a></li>
	                  </ul>
	                </li>
	                <li><a href="login.php">Log-in</a></li>
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="jumbotron" style="background-color: white; margin-top: 50px">
      		<div class="container text-center">
      			<p>Enter your e-mail to reset your password.</p>
      			<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
			    <input class="form-control" type="text" id="email" placeholder="Enter your e-mail"><br>
			    <button class="btn btn-success" onclick="resetFunction()">Reset</button><br>
			    <p id="succe"></p>
      		</div>
      	</div>

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
    		function resetFunction() {
				var email = document.getElementById("email").value;
				Parse.User.requestPasswordReset(email, {
					success: function() {
						//window location method helps to redirect to a new window.
						window.alert("An e-mail to reset your password has been sent!");
					},
					error: function(error) {
						//error msg
						alert("Error: " + error.code + " " + error.message);
					}
				});
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