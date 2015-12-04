


<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_USERNAME']);
	
?>


<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html"><img src="pinsulinlogo2.png" style="padding-top:4px;"height="90" width="250"></img></a></h1>
				<nav id="nav">
					<ul>
					   
						<li><a href="index.html">Home</a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="about.php">About </a></li>
						<li><a href="add.php">Add your Lab</a></li>
						<li><a href="lablogin.php">Login</a></li>
					</ul>
				</nav>
			</header>

			
			
			
			
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Login</h2>
						<p>login to update path lab details or to add new tests<br/>For help : +91-9717-06-5383</p>
					</header>

					<!-- Text -->
						
					<!-- Form -->
						<section>
						    <h3>If you haven't registered your lab,register <a style="color:green;"href="add.php">here.</a></h3>
							<form enctype="multipart/form-data" method="post" action="login_exec.php">
							<div class="row uniform 50%"style="text-align:center;">
							<div class="6u 12u$(xsmall)">
							<input type="text" name="user" id="user" value="" placeholder="Username"required/>
							</div>
							
							<div class="6u$ 12u$(xsmall)">
							<input type="password" name="pass" id="pass" value="" placeholder="Password" required/>
							</div>
							<div class="12u$">
							<ul class="actions">
								<li><input type="submit"id="submit" name="submit"value="Log In" class="special" /></li>
								<li><input type="reset" value="Reset" /></li>
							</ul>
							</div>
							</div>
							</form>'
							
							
							
						</section>

					

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<section class="4u 6u(medium) 12u$(small)">
							<h3>Introduction!</h3>
							<p>We are first of our kind with striking features
                             which makes this portal more user friendly.
                            In Pinsulin we work for the benefit of people.</p>
							<ul class="list">
								<li>COMPARE PRICES.SAVE TIME. SAVE MONEY!</li>
								<li>Get discounted health packages.</li>
								<li>Free Home Sample Collection.</li>
								<li>Compare & book test in less than five minutes.</li>
							</ul>
						</section>
						<section class="4u 6u$(medium) 12u$(small)">
							<h3>Shortcuts</h3>
							
							<ul class="alt">
								<li><a href="index.html">Home</a></li>
						        <li><a href="faq.html">FAQs</a></li>
						        <li><a href="about.php">About </a></li>
						        <li><a href="add.php">Add your Lab</a></li>
						        <li><a href="lablogin.php">Login</a></li>
							</ul>
						</section>
						<section class="4u$ 12u$(medium) 12u$(small)">
							<h3>Contact Us</h3>
							<ul class="icons">
								<li><a href="" class="icon rounded fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="" class="icon rounded fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="" class="icon rounded fa-pinterest"><span class="label">Pinterest</span></a></li>
								<li><a href="" class="icon rounded fa-google-plus"><span class="label">Google+</span></a></li>
								<li><a href="" class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="tabular">
								
								<li>
									<h3>Mail</h3>
									<a href="mailto:askpinsulin@gmail.com">askpinsulin@gmail.com</a>
								</li>
								<li>
									<h3>Phone</h3>
									(+91) 9717-06-5383
								</li>
							</ul>
						</section>
					</div>
					<ul class="copyright">
						<li>&copy; Pinsulin.in. All rights reserved.</li>
						
						
					</ul>
				</div>
			</footer>

	</body>
</html>