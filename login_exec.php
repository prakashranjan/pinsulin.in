<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('dbaseconnection.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$username = clean($_POST['user']);
	$password = clean($_POST['pass']);
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: lablogin.php");
		exit();
	}
 
	//Create query
	$qry="SELECT username FROM lablogin WHERE username='$username' AND password='$password'";
	$result=mysql_query($qry);
	$row=mysql_fetch_row($result);
	$user=$row[0];
	$sql=mysql_query("SELECT id,username FROM lablist WHERE username='$user'"); 
	//Check whether the query was successful or not
	if($sql) {
		if(mysql_num_rows($sql) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($sql);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_USERNAME'] = $member['username'];
			session_write_close();
			header("location: updatedetails.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: lablogin.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>