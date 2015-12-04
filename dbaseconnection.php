<?php   

$mysql_host = "******";
$mysql_database = "*******";
$mysql_user = "************";
$mysql_password = "************";
@mysql_connect("$mysql_host","$mysql_user","$mysql_password") or die ("could not connect");
@mysql_select_db("$mysql_database") or die ("no database");




?>