<?php
 include ("koneksi.php");
 
 $user=$_REQUEST['myusername'];
 $pass=md5($_REQUEST['mypassword']);
 
 $rs = mysql_query("select * from user where username = '$user' and password = '$pass'") or die(mysql_error());
 $a=mysql_fetch_array($rs);
 
 if($user=="" || $user==NULL){
 	header('location:index.php?err=Please insert your username.');
 }else if($pass=="" || $pass==NULL){
 	header('location:index.php?err=Please insert your password.');
 }else if(mysql_num_rows($rs)==1){
 	session_start();
		$_SESSION['login']="valid";
		$_SESSION['user']=$user;
		header("location:adminpage.php");
 }else{
 
 	header("location:index.php?msg=Invalid username and password.");
 }
?>