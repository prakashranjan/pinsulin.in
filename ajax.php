<?php include("dbaseconnection.php"); 


$name=$_POST['username'];
$sql=mysql_query("select username from lablist where username='$name'");
if($row=mysql_fetch_row($sql))
echo'username already exists';
else
echo'';	
?>