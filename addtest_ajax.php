<?php
include("dbaseconnection.php");
require_once("auth.php");

 $id=$_SESSION['SESS_MEMBER_ID'];
						 $sql=mysql_query("select labname from lablist where id='$id'");
						 $row=mysql_fetch_row($sql);
						 $lname=$row[0];
$tname=$_POST['tname'];
$rate=$_POST['rate'];
$counter=$_POST['counter'];
$tname = strtoupper($tname);
$sql3=mysql_query("select tname from testnames where tname='$tname' and labname='$lname'");
if($out=mysql_fetch_row($sql3)){
	echo'<h3 style="color:red;">';
echo'('.$counter.') New test addition unsuccessful.<br />Test already exists.<br>Please click <a style="color:green;text-decoration: underline;"href="edittest.php">here</a> to change its rate.</br>';
echo'</h3>';
}
else{
$sql=mysql_query("INSERT INTO testnames(tname,labname,rate) VALUES ('$tname','$lname','$rate')");

echo'<h3 style="color:green;">';
echo'('.$counter.') New test added successfully.<br>Thank you for collaborating with us.</br>';
echo'</h3>';
}



?>
