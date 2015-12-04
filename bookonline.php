 
 <?php include("dbaseconnection.php"); ?>
 <?php   $id=$_GET['id'];
 $sql2=mysql_query("Update testnames set tviews=tviews+1 where id='$id'");?>
 <?php date_default_timezone_set("Asia/Kolkata");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pinsulin.in</title>

</head>

<body>

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
	<style type="text/css">

	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('page-loader2.gif') 50% 50% no-repeat rgb(0,0,0);
}


	 
	 .wrapper {
		padding: 3em 0em 1em;
	}
	
	
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
</head>



	<body class="landing">
<div class="loader"></div>
	

		<!-- Header -->
			<header id="header"style="background:#202222;">
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
			
<?php
$sql=mysql_query("select tname,labname,rate from testnames where id='$id'");
$row=mysql_fetch_row($sql);
$sql3=mysql_query("Update lablist set likes=likes+1 where labname='$row[1]'");



?>
				
			



		<!-- Two -->
			<section id="two" class="wrapper style2 align-center">
			<hr /><hr />
			<div style="display:none;" id="out"><img src="animatedCircle.gif" /></div>
				<div id="return"class="container">
				
					<header>

                         <h2 style="font-size:40px;">Online Booking Form</h2>
         <p >For help : +91-9717-06-5383</p>
					</header>
					
				<div class="row uniform 50%">
				<div class="6u$ 12u$(xlarge)">
								     <table style="list-style:none;text-align:center;">
									 <tr>
										<td style="font-weight:bold;">TEST &nbsp;&nbsp;&nbsp;&nbsp;:</td><td style="font-weight:bold;"> <span style="font-size:20px;color:green;"><?php echo $row[0];?></span></td></tr>
										<tr><td style="font-weight:bold;">RATE &nbsp;&nbsp;&nbsp;&nbsp;:</td><td style="font-weight:bold;"> Rs <span style="font-size:20px;color:green;"><?php echo $row[2];?></span></td></tr>
										<tr><td style="font-weight:bold;">LAB &nbsp;&nbsp;&nbsp;&nbsp;  :</td> <td style="font-weight:bold;"> <span style="font-size:20px;color:green;"><?php echo $row[1];?></span></td></tr>
									</table>
   								    
									</div>
									
				                    <input type="hidden" name="tname" id="tname" value="<?php echo $row[0];?>"  />
									<input type="hidden" name="labname" id="labname" value="<?php echo $row[1];?>" />
									<input type="hidden" name="rate" id="rate" value="<?php echo $row[2];?>" />
				<input type="hidden" name="time" id="time" value="<?php print date("h:i:s");?>" />
									<input type="hidden" name="date" id="date" value="<?php print date("y-m-d");?>" />
									<div class="6u 12u$(xlarge)">
										<h3>Enter Your Details</h3>
									</div>
				
									<div class="6u 12u$(xsmall)">
										<input type="text" name="name" id="name" value="" placeholder="Enter Your Name" required/>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="phone" id="phone" value="" placeholder="phone number" required/>
									</div>
									<div class="6u$ 12u$(xlarge)"style="text-align:center;">
									<input type="email" name="email" id="email" value="" placeholder=" Your Email id " required/>
									</div>
									
									<div class="6u$ 12u$(xlarge)"style="text-align:center;">
									<input type="text" name="address" id="address" value="" placeholder=" Your Address" required/>
									</div>
									<div class="6u$ 12u$(xlarge)"style="text-align:center;">
								
								    <button onclick="book()" id="book"class="button small">BOOK</button>
									</div>
									
									
								<script>

function book(){
	$('#return').hide();
	$('#out').show();
 $.ajax({
         type:"post",
   url: "bookajax.php",
   
   data: {name:$("#name").val() ,phone:$("#phone").val(), address:$("#address").val(),tname:$("#tname").val(),labname:$("#labname").val(),rate:$("#rate").val(),time:$("#time").val(),date:$("#date").val(),email:$("#email").val()},
   success: function( data ) {
	   $("#out").hide();
   $( "#return" ).html(data);
   $('#return').show();
   },
   async:true
});
}	
</script>   
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
