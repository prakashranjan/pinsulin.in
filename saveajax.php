 <?php
include("dbaseconnection.php");
require_once("auth.php");

 
$nrate=$_POST['nrate'];
$id=$_POST['id'];

$sql=mysql_query("update testnames set rate='$nrate' where id='$id'");

echo'<h3 style="color:green;">';
echo'New rate saved successfully.<br>Thank you for collaborating with us.</br>';
echo'</h3>';




?>
