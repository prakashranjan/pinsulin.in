
 <?php include("dbaseconnection.php"); ?>
 <?php
$lat=$_POST['lat'];
$lon=$_POST['lon'];
$i=0;
$j=0;
?>
                   
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pinsulin.in</title>
</head>

<body>

 <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>pinsulin.in</title>
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
	background: url('page.gif') 50% 50% no-repeat rgb(0,0,0);
}		 
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
				<h1 ><a href="index.html"><img src="pinsulinlogo2.png" style="padding-top:4px;"height="90" width="250"></img></a></h1>
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
			
			function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

?>


			



		<!-- Two -->
			<section id="two" class="wrapper style2 align-center">
				<div class="container">
					     
						
                         <h2 style="font-size:40px;"><i class="fa fa-street-view"></i>&nbsp;Nearby Labs</h2>
                          
		 <form method="post" action="compare.php#two">
					<div class="12u$">
										<ul class="actions">
									      
											<li><input type="submit"name="submit" value="Compare Selected Labs" class="special" /></li>
											
										</ul></div>
					</header>
					
			<div class="table-wrapper">
			
								<table>
									<thead>
										<tr style="font-size:20px;">
											<th style="text-align:center;"><i class="fa fa-check-square-o  fa-lg"></i>&nbsp;&nbsp;&nbsp;</th>
											<th style="text-align:center;"><i class="fa fa-flask"></i>&nbsp;&nbsp;Lab Name</th>
											<th style="text-align:center;"><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;Distance</th>
										</tr>
									</thead>
									<tbody>
									<?php
$sql=mysql_query("select latitude,longitude,labname,id from labbranch");
$x=1;
while($row=mysql_fetch_row($sql))
{$la=$row[0];
$lo=$row[1];
$id=$row[3];

$dis=distance($lat, $lon, $la, $lo,"K");
if($dis>999){
	$distance=sprintf('%0.2f', ($dis/1000));
	$u=" km";
}
else
{$distance=sprintf('%0.0f', $dis);
$u=" m";
}
	
	
	

	if($dis<=4000){
		
		
		$arr_nav[]=array("dis" => $dis , 
    	  "lname" => $row[2],
    	  "id" => $id,
		  "unit" => $u,
		  "distance"=> $distance
		  );
    			
 $x++;
	
	}
}

array_multisort($arr_nav);
for($k=1;$k<$x;$k++){
	echo'<tr>
											<td>
										<input type="checkbox" value="'.$arr_nav[$i]['id'].'" id="'.$i.'" name="check[]">
										<label for="'.$i.'"></label>
									</td>
											<td><a style="text-decoration:none;"href="#"><strong style="color:green;">'.$arr_nav[$i]['lname'].'</strong></a></td>
											<td><strong>'.$arr_nav[$i]['distance'].'</strong> '.$arr_nav[$i]['unit'].'</td>
	</tr>';
	$i++;									
}
?>									
										
									</tbody>
									<tfoot>
										
									</tfoot>
								</table>
							</div>	 
				  </form>
					
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
                            In pinsulin we work for the benefit of people.</p>
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
						<li>&copy; pinsulin.in. All rights reserved.</li>
						
						
					</ul>
				</div>
			</footer>

</body>
</html>
