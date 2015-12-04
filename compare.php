

 <?php include("dbaseconnection.php"); ?>
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
			<header id="header" style="background:#202222;">
				<h1><a href="index.html"><img src="pinsulinlogo2.png" style="padding-top:4px;"height="90" width="250"></img></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html"><i class="fa fa-home fa-2x fa-fw"></i></a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="about.php">About </a></li>
						<li><a href="add.php">Add your Lab</a></li>
						<li><a href="lablogin.php">Login</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			
		


<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check']);?>
		<!-- Three -->
			<section id="two" class="wrapper style2 align-center">
				<div class="container">
					
						<h2 style="font-size:40px;"><i class="fa fa-balance-scale"></i>&nbsp;Compare Labs</h2>
						<p style="font-size:15px;"><?php echo "You have selected following <strong>".$checked_count."</strong> Lab(s)";?><p>
					
					<div >
					<table  cellpadding="0" cellspacing="0">
	
									
<?php 

// Loop to store and display values of individual checked checkbox.
foreach($_POST['check'] as $selected) {
	$sql=mysql_query("select labname from labbranch where id='$selected'");
	$row=mysql_fetch_row($sql); 
	$labn=$row[0];
	$sql2=mysql_query("select logo,lrating,nabl,estd,likes,id from lablist where labname='$labn'");
	$result=mysql_fetch_row($sql2);
	$sql3=mysql_query("select tname from testnames where labname='$labn' limit 10");
	$j=0;
	
	while($r=mysql_fetch_row($sql3))
	{$s[$j]=$r[0];
	$j=$j+1;
	}
$news=implode(' | ',$s);
	
	echo'<tr style="background:rgba(144, 144, 144, 0.45);"><th style="text-align:center;padding-top:5px;padding-bottom:0px;  "><a href="lab.php?id='.$result[5].'#one" class="button small">Select</a></th>
	<th style="text-align:center;"><i class="fa fa-calendar"></i>&nbsp;Estd.in</th>
	<th style="text-align:center;"><i class="fa fa-star"></i></th>
	<th style="text-align:center;">NABL</th>
	<th style="text-align:center;"><i class="fa fa-eye "></i></th>	
										</tr>';
echo'<tr><td><a style="text-decoration:none;"href="lab.php?id='.$result[5].'#one"><i class="fa fa-flask"></i>&nbsp;&nbsp;<strong  style="color:green;">'.$labn.'</strong></a></td><td>'.$result[3].'</td><td><strong style="color:green;">'.$result[1].'</strong></td><td><img height="20" width="20"src="images/'.$result[2].'.png"></img></td><td><strong style="color:green;">'.$result[4].'</strong></td></tr>';
echo'<tr style="border-bottom:2px dashed black;"><td colspan="5"><p><span class="image left"><a href="lab.php?id='.$result[5].'#one"><img src="data:image;base64,'.$result[0].' "height="140" width="140" alt="" /></a></span><strong>Tests: </strong> <a style="text-decoration:none;" href="lab.php?id='.$result[5].'#one">'.$news.'|</a><span style="font-size:15px;"> <a href="lab.php?id='.$result[5].'#one"style="color:green;">show more....</a></span> </p></td></tr>';
echo'<tr></tr>';	
$news=null;
$s=null;									
}
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}

?>
</table>
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