    <?php
 require_once("auth.php");?>
 <?php include("dbaseconnection.php");

$user=$_SESSION['SESS_USERNAME'];
$id=$_GET['id'];
 ?>
 <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Upload Report</title>
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
	padding:10px;
	
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
						                <li><a href="dashboard.php">Dashboard</a></li>
						<li><a style="font-size:20px;color:green;"href="lablogin.php">Logout</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
		
		
		
			<section id="main" class="wrapper">
			
				<div id="return" class="container" >

					<header style="text-align:center;">

                         <h1 style="font-size:60px;">Upload Report</h1>
                         <p >For help : +91-9717-06-5383</p>
					</header>				
						<hr /><hr /><hr /><hr /><hr />
						<?php   
		if(isset($_POST['submit'])){
			$sql3=mysql_query("select username,phone,date from dashboard where id='$id'");
			$data=mysql_fetch_row($sql3);
			$pdfno=$_POST['pdf'];
			if(isset($_FILES['file'])){
    $file_name = $_FILES['file']['tmp_name'];
    
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];

$fname="reports/$pdfno-$data[0]_$data[1]_$data[2].pdf";

    move_uploaded_file($file_tmp,$fname);
	$sql8=mysql_query("update dashboard set $pdfno='$fname' where id='$id'");
	
	echo'<div><h3 style="color:green;"id="response">';
 echo "Report uploaded successfuly!";
echo'</br>Want to upload another report.</h3>';
echo'</div>';
   

}            
	
		}
		?>
							<form method="post" enctype="multipart/form-data"action="uploadreport.php?id=<?php print $id;?>">
						<ul class="actions" style="text-align:center;">
								
								<li><div class="file-input-wrapper">
  <button class="btn-file-input icon fa-download"> Upload pdf</button>
  <input type="file" name="file" id="file"required/>
</div></li>
								<li><div class="select-wrapper">
											<select name="pdf" id="pdf" required>
												<option value="">- Select Report Number -</option>
												<option value="pdf1">Report 1</option>
												<option value="pdf2">Report 2</option>
												<option value="pdf3">Report 3</option>
											</select>
										</div></li>
										<li><input type="submit" name="submit" id="submit"value="Confirm Report Upload"></input></li>
										
							</ul>
		</form>
				<?php 
		
		$sql=mysql_query("select pdf1,pdf2,pdf3 from dashboard where id='$id'");
		$row=mysql_fetch_row($sql);
	
	for($i=0;$i<3;$i++)
	{		if(!($row[$i]))
		     {$check[$i]="false";
              $row[$i]="#";
              $w[$i]="empty"; }
			  
		 else{$check[$i]="true";
		 $w[$i]="Open Report";}
		
	}	
		
		?>
	 <div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr >
											<th style="text-align:center;">Report 1</th>
											<th style="text-align:center;">Report 2</th>
											<th style="text-align:center;">Report 3</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:center;"><img height="20" width="20"src="images/<?php echo $check[0];?>.png"></img></td>
											<td style="text-align:center;"><img height="20" width="20"src="images/<?php echo $check[1];?>.png"></img></td>
											<td style="text-align:center;"><img height="20" width="20"src="images/<?php echo $check[2];?>.png"></img></td>
										</tr>
										<tr>
											<td style="text-align:center;"><a href="<?php print $row[0];?>" class="small button"><?php echo $w[0];?></a></td>
											<td style="text-align:center;"><a href="<?php print $row[1];?>" class="small button"><?php echo $w[1];?></a></td>
											<td style="text-align:center;"><a href="<?php print $row[2];?>" class="small button"><?php echo $w[2];?></a></td>
										</tr>
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