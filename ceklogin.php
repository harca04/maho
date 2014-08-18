<?php
	session_start();
 	require_once('koneksi.php');
	$errmsg_arr = array();
 	$errflag = false;

	function clean($str) { /// biar ga di hack
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	$myusername = clean($_POST['myusername']);
	$mypassword = clean($_POST['mypassword']);
 
	if($myusername == '') {
		$errmsg_arr[] = 'diisi usernamenya dong bray !';
		$errflag = true;
	}
	if($mypassword == '') {
		$errmsg_arr[] = 'diisi passwordnya dong bray !';
		$errflag = true;
	}
 
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
 
	$qry="SELECT * FROM member WHERE myusername='$myusername' AND mypassword='$mypassword'";
	$result=mysql_query($qry);
 
	if($result) {
		if(mysql_num_rows($result) > 0) {
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['myusername'];
			$_SESSION['SESS_LAST_NAME'] = $member['mypassword'];
			if($member['mem_id'] == 1){
				session_write_close();
				header("location: adminpage.php");
			}else{
				session_write_close();
				header("location: superpage.php");
			}
			exit();
		}else {
			$errmsg_arr[] = 'gak ketemu username sama passwordnya bray !!';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: index.php");
				exit();
			}
		}
	}else {
		die("lu maho banget bray !!!");
	}
?>