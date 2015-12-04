
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pinsulin.in</title>

<style type="text/css">
input[type="text"]::-webkit-input-placeholder {
color: #C7C7C7 !important;
}
 
input[type="text"]:-moz-placeholder { /* Firefox 18- */
color: #C7C7C7 !important;  
}
 
input[type="text"]::-moz-placeholder {  /* Firefox 19+ */
color: #C7C7C7 !important;  
}
 
input[type="text"]:-ms-input-placeholder {  
color: #C7C7C7 !important;  
}
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('page-loader2.gif') 50% 50% no-repeat rgb(0,0,0);
}		 
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
</head>



	<body >
<div class="loader"></div>


 <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Pinsulin.in</title>
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
	<body class="landing">

		<!-- Header -->
			<header id="header" style="background:#202222;">
				<h1 ><a href="index.html"><img src="pinsulinlogo2.png" style="padding-top:4px;"height="90" width="250"></img></a></h1>
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
 
		<!-- Banner -->
			

				
			

		<!-- One -->
			<section id="one" class="wrapper style1 align-center">
            <?php include("dbaseconnection.php"); ?>
<?php $tn=$_POST['testname']; ?>
			  <div class="container">
			  <hr /><hr />
			    <header>
			      <h2 style="font-size:40px;">Did you mean ??</h2>
                  <p style="font-size:20px;color:silver;">Showing results for: <?php echo'<span style="color:lightgreen;"> '.$tn.'</span>'?></p>
                  <br />
			      <ul style="list-style-type: none;">
                   <?php 
$sql=mysql_query("SELECT DISTINCT tname from testnames where tname LIKE '%" . $tn . "%' or tname LIKE '$tn%' ");


 
while($row = mysql_fetch_row($sql))
{echo'
 
    <li>&nbsp;<a style="font-size:35px;font-family :Lato, Helvetica, sans-serif; text-decoration: none;color: #ffffff;"
	href="show.php?test_name='.$row[0].'&#two">'.$row[0].'</a> </li><br />
		 
  

  ';
}



 ?>
                  
                  
                  </ul>
		        </header>
                
			   
		      </div>
    </section>
			<div id="corusel"></div>
	<!--crousel--!>






		<!-- Two -->
			

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
