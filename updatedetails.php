 <?php
 require_once("auth.php");?>
 <?php include("dbaseconnection.php"); ?>
 <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Update details</title>
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
						<li><a href="#edit">Edit your lab details</a></li>
										<li><a href="#addtest">Add New Test</a></li>
										<li><a href="edittest.php">Change tests Rates</a></li>
										<li><a href="dashboard.php">Dashboard</a></li>
						<li><a style="font-size:20px;color:green;"href="lablogin.php">Logout</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Update Details</h2>
						<p>For help : +91-9717-06-5383</p>
					</header>
					
					
                         <?php  
						 $id=$_SESSION['SESS_MEMBER_ID'];
						 $sql=mysql_query("select labname,description,link,estd,email,ownername from lablist where id='$id'");
						 $row=mysql_fetch_row($sql);
						 $lname=$row[0];
						 $desc=$row[1];
						 $link=$row[2];
						 $estd=$row[3];
						 $email=$row[4];
						 $owner=$row[5];
						 $sql2=mysql_query("select address,phone,zip from labbranch where labname='$lname'");
						 $ro=mysql_fetch_row($sql2);
						 $address=$ro[0];
						 $phone=$ro[1];
						 $zip=$ro[2];
						 
						 ?>
						 
						 
						 <?php
						 function Get_LatLng_From_Google_Maps($address) {


	$url = "http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false";


	// Make the HTTP request
	$data = @file_get_contents($url);
	// Parse the json response
	$jsondata = json_decode($data,true);


	



	$LatLng = array(
	    'lat' => $jsondata["results"][0]["geometry"]["location"]["lat"],
	    'lng' => $jsondata["results"][0]["geometry"]["location"]["lng"],
	);


	return $LatLng;
}





if(isset($_POST['submit'])){
	
	
	$nlname=$_POST['name'];
	$nlname = strtoupper($nlname);


$naddress=$_POST['address'];
$newaddress=urlencode($naddress);
$nphone=$_POST['phone'];
$nzip=$_POST['zip'];
$ndesc=$_POST['message'];
$ndesc = strtoupper($ndesc);
$nlink=$_POST['link'];
$nestd=$_POST['estd'];
$nemail=$_POST['email'];
$nowner=$_POST['owner'];
$nowner = strtoupper($nowner);

$coordinates=Get_LatLng_From_Google_Maps($newaddress);
$lati=$coordinates['lat'];
$long=$coordinates['lng'];



if(is_uploaded_file($_FILES['file']['tmp_name'][0])){
for($t=0;$t<5;$t++) {
    

 if(!(is_uploaded_file($_FILES['file']['tmp_name'][$t])))
                {
                   $nimage[$t]= "defaultlab.jpg";

                    $name2[$t]='defaultlab.jpg';
                    $nimage[$t]= file_get_contents($nimage[$t]);
                    $nimage[$t]= base64_encode($nimage[$t]);
                    
                }
                else
                {
                    $nimage[$t]= addslashes($_FILES['file']['tmp_name'][$t]);
                    $name2= addslashes($_FILES['file']['name'][$t]);
                    $nimage[$t]= file_get_contents($nimage[$t]);
                    $nimage[$t]= base64_encode($nimage[$t]);
                   
                }
				
}
$sql5=mysql_query("update lablist SET logoname='$name2',logo='$nimage[0]',logo2='$nimage[1]',logo3='$nimage[2]',logo4='$nimage[3]',logo5='$nimage[4]' where labname='$lname'");	
}

  


	
$sqlnew=mysql_query("update testnames SET labname='$nlname' where labname='$lname'");	
$sql3=mysql_query("update labbranch SET labname='$nlname',address='$naddress',phone='$nphone',zip='$nzip',latitude='$lati',longitude='$long' where labname='$lname'");	
$sql4=mysql_query("update lablist SET labname='$nlname',description='$ndesc',link='$nlink',estd='$nestd',email='$nemail',ownername='$nowner' where id='$id'");



echo'<div><h2 style="color:green;"id="response">';
echo'Changes are saved.<br>Thank you for collaborating with us.</br>';
echo'</h2>';
echo'</br><h2 style="color:gray;">Want to change again!</h2>';
echo'</div>';	
}
?>

<ul class="alt"style="text-align:center;font-size:18px;">
                                        <li><a class="button fit" href="dashboard.php">Dashboard</a></li>
										<li><a class="button fit"href="#edit">Change your Lab Details</a></li>
										<li><a class="button fit"href="#addtest">Add New Test</a></li>
										<li><a class="button fit "href="edittest.php">Change Tests Rates</a></li>
										<li>&nbsp;</li>
									</ul>
						  <h2 id="edit">Change your Lab Details</h2>
							<form enctype="multipart/form-data" action="updatedetails.php" method="post">
								<div class="row uniform 50%">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="name" id="name" value="<?php echo $lname;?>" placeholder="Lab Name ( different for branches)" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" required/>
									</div>
									
									<div class="6u 12u$(xlarge)">
										<input type="text" name="address" id="address" value="<?php echo $address;?>" placeholder="Lab Address ( in detail with street name, sector number,....)" required/>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="zip" id="zip" value="<?php echo $zip;?>" placeholder="Pin code (Zip)" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="Phone number( eg. +919891XXXXXX, +919289XXXXXX.... )" required/>
									</div>
									
									<div class="6u 12u$(xsmall)">
										<input type="text" name="estd" id="estd" value="<?php echo $estd;?>" placeholder="Lab established in the year"required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="owner" id="owner" value="<?php echo $owner;?>" placeholder="Owner Name" required/>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="link" id="link" value="<?php echo $link;?>" placeholder="Lab Website Link ( eg. http://www.example.com )" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										 <div class="file-input-wrapper">
  <button class="btn-file-input">Upload Lab's 5 New Picture ( within 60kb )</button>
  <input type="file" name="file[]" id="file" multiple>
</div>
									</div>
									
									
									<div class="6u$ 12u$(small)">
										<input type="checkbox" id="human" name="human" checked>
										<label for="human">I am a human and not a robot</label>
									</div>
									<div class="12u$">
										<textarea name="message" id="message" placeholder="Enter Lab Description..." rows="6"required><?php echo $desc;?></textarea>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input id="submit"  name="submit" type="submit" class="special" value="Save Changes"/></li>
											<li><input type="reset" value="Reset" /></li>
											
										</ul>
									</div>
									
								</div>
							</form>
							<ul  class="alt"style="text-align:center;">
										<li>&nbsp;</li>
										<li id="addtest">&nbsp;</li>
									</ul>
							<hr /><hr /><br />
							<h2 style="text-align:center;">Add new pathology test</h2>
						<div class="row uniform 50%">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="tname" id="tname" value="" placeholder="Enter Test Name" required/>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="price" id="price" value="" placeholder="Rate ( only numbers ex.rate:1200 )" required/>
									</div>
									<div class="6u$ 12u$(xlarge)"style="text-align:center;">
								    <button onclick="addtest()" id="addtest"class="button">Add New test</button>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<div id="return"></div>
									</div>
									
								<script>
var count=1;
function addtest(){
 $.ajax({
         type:"post",
   url: "addtest_ajax.php",
   
   data: {tname:$("#tname").val() ,rate:$("#price").val(),counter:count},
   success: function( data ) {count=count+1;
   $( "#return" ).html(data);
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