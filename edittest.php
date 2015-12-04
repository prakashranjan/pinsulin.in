 <?php
 require_once("auth.php");?>
 <?php include("dbaseconnection.php"); ?>
 <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Edit test data</title>
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
		
		
		<style type="text/css">
		.file-input-wrapper {
    width: 100%;
   
    overflow: hidden;
    position: relative;
}
.file-input-wrapper > input[type="file"] {
    font-size: 200px;
    position: absolute;
    top: 0;
    right: 0;
    opacity: 0;
}
.file-input-wrapper > .btn-file-input {
    display:visible;
    width: 100%;
	padding-top:8px;
	padding-bottom:8px;
   font-size:20px;
	background-color: rgba(0, 204, 102, 0.95);
	border-radius:10px;
	font-family: "Lato", Helvetica, sans-serif;
	color:white;
}
.file-input-wrapper:hover > .btn-file-input {
    background-color: rgba(0, 204, 102, 0.68);
}

		</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html"><img src="pinsulinlogo2.png" style="padding-top:4px;"height="90" width="250"></img></a></h1>
				<nav id="nav">
					<ul>
					<li><a href="">User :<span style="color:green;font-size:20px;"> <?php print $_SESSION['SESS_USERNAME']?></span></a></li>
						<li><a href="updatedetails.php">Home</a></li>
						<li><a href="updatedetails.php#edit">Edit your lab details</a></li>
										<li><a href="updatedetails.php#addtest">Add New Test</a></li>
										<li><a href="edittest.php">Change tests Rates</a></li>
						
						<li><a style="font-size:20px;color:green;"href="lablogin.php">Logout</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Change Test Rate</h2>
						<p>For help : +91-9717-06-5383</p>
					</header>
                        
						 
						 
						 <script>
						function search(){
							$.ajax({
         type:"post",
   url: "searchajax.php",
   
   data: {tname:$("#tname").val()},
   success: function( data ) {
   $( "#return" ).html(data);
   },
   async:true
   });
						}
   
   </script>
						 
						 <h2 style="text-align:left;">Search Test</h2>
						<div class="row uniform 50% ">
									<div class="6u 12u$(xsmall)";">
										<input type="text" name="tname" id="tname"onkeyup="search()" value="" placeholder="Enter Test Name" required/>
										
									</div>
									<div class="6u$ 12u$(xsmall)">
										<button onclick="search()" id="changerate"class="button">search</button>
									</div>
									
									<div class="6u$ 12u$(xlarge)">
										<div id="return"></div>
									</div>
						 
						

						  
</div>
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