
<?php include("dbaseconnection.php"); ?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Add your Lab</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
		<script type="text/javascript"><!--
function checkPasswordMatch() {
    var password = $("#pass").val();
    var confirmPassword = $("#cpass").val();

    if (password != confirmPassword)
        $("#checkpass").html("*not matching..").css('color', 'red');
    else
        $("#checkpass").html("matched").css('color', 'green');
}
//--></script>
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
						<h2>Register your Path Lab</h2>
						<p>For help : +91-9717-06-5383</p>
					</header>

					<!-- Text -->
				
					<!-- Form -->
						<section>
						<?php  
			if(isset($_POST['submit'])){								
$name=$_POST['name'];
$name = strtoupper($name);
$email=$_POST['email'];
$email = strtolower($email);
$address=$_POST['address'];
$address = strtoupper($address);
$zip=$_POST['zip'];
$phone=$_POST['phone'];
$nabl=$_POST['nabl'];
$estd=$_POST['estd'];
$owner=$_POST['owner'];
$owner = strtoupper($owner);
$link=$_POST['link'];
$user=$_POST['user'];
$cpass=$_POST['cpass'];


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

for($t=0;$t<5;$t++) {
    

 if(!(is_uploaded_file($_FILES['file']['tmp_name'][$t])))
                {
                   $image[$t]= "defaultlab.jpg";

                    $name2[$i]='defaultlab.jpg';
                    $image[$t]= file_get_contents($image[$t]);
                    $image[$t]= base64_encode($image[$t]);
                    
                }
                else
                {
                    $image[$t]= addslashes($_FILES['file']['tmp_name'][$t]);
                    $name2= addslashes($_FILES['file']['name'][$t]);
                    $image[$t]= file_get_contents($image[$t]);
                    $image[$t]= base64_encode($image[$t]);
                   
                }
				
}

$human=$_POST['human'];
$message=$_POST['message'];


$sql=mysql_query("INSERT INTO lablist(labname,logoname,logo,logo2,logo3,logo4,logo5,nabl,description,link,estd,email,ownername,username) VALUES ('$name','$name2','$image[0]','$image[1]','$image[2]','$image[3]','$image[4]','$nabl','$message','$link','$estd','$email','$owner','$user')");
$newaddress=urlencode($address);
$coordinates=Get_LatLng_From_Google_Maps($newaddress);
$lati=$coordinates['lat'];
$long=$coordinates['lng'];
$sql2=mysql_query("Insert into labbranch(labname,address,phone,zip,latitude,longitude) VALUES ('$name','$address','$phone','$zip','$lati','$long')");


$sql3=mysql_query("Insert into lablogin(username,password) VALUES ('$user','$cpass')");
echo'<div><h2 style="color:green;"id="response">';
echo'Details are saved.<br>Thank you for collaborating with us.</br>
Now you can login with username and password to update details.';
echo'</h2>';
echo'</br><h2 style="color:gray;">Want to add another lab!</h2>';
echo'</div>';
			}
						
?>
<script>

function checkuser(){

$.ajax({
         type:"post",
   url: "ajax.php",
   
   data: {username:$("#user").val()},
   success: function( data ) {
   $( "#checkuser" ).html(data).css('color','red');
   },
   async:true
   });
}
</script>




							<h3>Please Enter Details carefully!</h3>
							<form enctype="multipart/form-data" action="add.php" method="post">
								<div class="row uniform 50%">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="name" id="name" value="" placeholder="Lab Name ( different for branches)" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required/>
									</div>
									
									<div class="6u 12u$(xlarge)">
										<input type="text" name="address" id="address" value="" placeholder="Lab Address ( in detail with street name, sector number,pin code,....)" required/>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="zip" id="zip" value="" placeholder="Pin code ( Zip or postal code )" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="phone" id="phone" value="" placeholder="Phone number( eg. +919891XXXXXX, +919289XXXXXX.... )" required/>
									</div>
									<div class="4u 12u$(small)">
										<input type="radio" id="nabl-yes" value="true"name="nabl" checked>
										<label for="nabl-yes">have NABL certification</label>
									</div>
									<div class="4u 12u$(small)">
										<input type="radio" id="nabl-no" value="false"name="nabl">
										<label for="nabl-no">doesn't have NABL certification</label>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="estd" id="estd" value="" placeholder="Lab established in the year" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="owner" id="owner" value="" placeholder="Owner Name" required/>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="link" id="link" value="" placeholder="Lab Website Link ( eg. http://www.example.com )" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										 <div class="file-input-wrapper">
  <button class="btn-file-input">Upload Lab's 5 Picture ( within 60kb )</button>
  <input type="file" name="file[]" id="file" multiple>
</div>
									</div>
									
									<div class="6u 12u$(xsmall)">
										<input type="text" name="user" id="user" value="" onblur="checkuser()" placeholder="Username" required/>
										<span id="checkuser"></span>
									</div>
									
									<div class="6u 12u$(xsmall)">
										<input type="password" name="pass" id="pass"  placeholder="Password" required/>
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="password" name="cpass" id="cpass"  onkeyup="checkPasswordMatch();"placeholder="Confirm Password" required/>
										<span id="checkpass"></span>
									</div>
									
									<div class="6u$ 12u$(small)">
										<input type="checkbox" id="human" name="human" checked>
										<label for="human">I am a human and not a robot</label>
									</div>
									<div class="12u$">
										<textarea name="message" id="message" placeholder="Enter Lab Description..." rows="6"required></textarea>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input id="submit"  name="submit" type="submit" class="special" value="Submit Details"/></li>
											<li><input type="reset" value="Reset" /></li>
											
										</ul>
									</div>
									
								</div>
							</form>
							
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