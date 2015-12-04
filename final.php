

 <?php include("dbaseconnection.php"); 
 $id=$_GET['id'];
 
 $sql=mysql_query("Update testnames set tviews=tviews+1 where id='$id'");
 $sql2=mysql_query("Select tname,labname,rate,rating from testnames where id='$id'");
 $row=mysql_fetch_row($sql2);
 $tname=$row[0];
 $lname=$row[1];
 $rate=$row[2];
 $rating=$row[3];
 
 $sql3=mysql_query("Update lablist set likes=likes+1 where labname='$lname'");
 
 ?>
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
	
	#showonmap{background:rgba(153, 153, 225, 0.85);
	padding-left:10px;
	padding-right:10px;}
	#showonmap:hover{background:rgba(153, 153, 225, 0.45);
	
	}
	table tbody tr:nth-child(2n + 1) {
				background-color: rgba(144, 144, 144, 0.75);
			}
			#book{background:rgba(153, 153, 225, 0.95);}
			#book:hover{background-color: rgba(0, 204, 102, 0.8);}

	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('page-loader2.gif') 50% 50% no-repeat rgb(0,0,0);
}		 


@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}

body { margin: 0; } 
div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 14s slidy infinite; 
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
						<li><a href="index.html">Home</a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="about.php">About </a></li>
						<li><a href="add.php">Add your Lab</a></li>
						<li><a href="lablogin.php">Login</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			
<!-- two -->
<section id="one" class="wrapper style1 align-center">
			  <div class="container">
			    
				<section>
				<div class="box alt">
								
				<?php 
				$ram=mysql_query("select address,phone,id from labbranch where labname='$lname'");
				$ar=mysql_fetch_row($ram);
				$sql=mysql_query("select labname,logo,link,description,likes,logo2,logo3,logo4,logo5 from lablist where labname='$lname'");
				$row=mysql_fetch_row($sql);
			    $desc=$row[3];
				$link=$row[2];
				
				echo'
				<div id="slider">
<figure>
            <img height="426" class="image fit"  src="data:image;base64,'.$row[1].' " alt="" >
            <img   height="426" class="image fit" src="data:image;base64,'.$row[5].' " alt="" >
            <img height="426"  class="image fit" src="data:image;base64,'.$row[6].' "  alt="" >
            <img   height="426" class="image fit" src="data:image;base64,'.$row[7].' "  alt="" >
            <img   height="426"  class="image fit" src="data:image;base64,'.$row[8].' " >
</figure>
</div>
     
            
       
       
    ';?>
	
	</div>
			</section>
<header>			
			<?php   echo'<p><span style="font-size:25px;color:white;font-weight:bold;">'.$row[0].'</span></br><a id="showonmap"href="showmap.php?id='.$ar[2].'"class="button small fit">show on map</a></p>';?>
			       </header>
			   
				<div class="table-wrapper">
								<table>
									<thead>
									<tr style="background:rgba(244, 244, 244, 0.95);">
											
											<th colspan="3"style="text-align:center;padding-top:6px;border-bottom:3px dashed ;"><a href="bookonline.php?id=<?php echo $id;?>"id="book"class="button">Book test online!</a></th>
										</tr>
								
										<tr style="background:rgba(244, 244, 244, 0.95);">
											<th style="text-align:center;">Test Name</th>
											<th style="text-align:center;">Rate</th>
											<th style="text-align:center;">Views</th>
										</tr>
									</thead>
									<tbody>
									<?php
									
                                     $query=mysql_query("select tname,rate from testnames where id='$id' ");
									 $r=mysql_fetch_row($query);
									 
									
											echo'<tr><td>'.$r[0].'</td>
											<td>Rs '.$r[1].'</td>
											<td>'.$row[4].'</td>
									 </tr >
									 <tr>
									 <td colspan="3"<h4><span style="font-size:22px;color:lightgreen;">Address</span></h4>
							<blockquote>'.$ar[0].'</br>call at : <span style="color:#33FFFF;">'.$ar[1].'</span> .</blockquote></td>
									 </tr>
									 <tr>
									 <td colspan="3"<h4><span style="font-size:17px;color:lightgreen;">Lab Description</span></h4>
							<blockquote>'.$desc.'</blockquote></td>
									 </tr>';
									 
									 
									 
									 ?>										
									</tbody>
									
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