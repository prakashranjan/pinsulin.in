  <?php
include("dbaseconnection.php");


 
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$tname=$_POST['tname'];
$labname=$_POST['labname'];
$time=$_POST['time'];
$date=$_POST['date'];

$email=$_POST['email'];

$sql=mysql_query("select username from lablist where labname='$labname'");
$mql=mysql_query("select rate from testnames where labname='$labname' and tname='$tname'");
$mata=mysql_fetch_row($mql);
$row=mysql_fetch_row($sql);
$luser=$row[0];
$query=mysql_query("insert into dashboard (tname,username,name,phone,address,time,date,rate,email) values ('$tname','$luser','$name','$phone','$address','$time','$date','$mata[0]','$email')");
echo'<hr /><hr /><hr /><hr /><h2>Thank You!</h2>';
echo'<h3 style="color:green;">';
echo'You have successfully booked your appointment.<br><span style="color:red;">You will get a confirmation call within 12 hrs</span></br>Thank you.';
echo'</h3>';




?>