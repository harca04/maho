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
 
	if($idproduk == '') {
		$errmsg_arr[] = 'ah elah loe lupa isi id produk';
		$errflag = true;
	}
	if($jumlahlaku == '') {
		$errmsg_arr[] = 'jiaaa... jumlahnya berapa woi!!?';
		$errflag = true;
	}
 
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: insertdai.php");
		exit();
	}
 
	$qry="SELECT * FROM menu WHERE idmenu='$idproduk'";
	$result=mysql_query($qry);
 
	if($result) {
		$qry="INSERT INTO tempsales WHERE tempid='$idproduk'";
			
			header("location: insertdai.php");
			exit();
		}else {
			$errmsg_arr[] = 'gak ada menu dengan nomer itu coy';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: insertdai.php");
				exit();
			}
		}
	}else {
		die("lu kaco banget bray !!!");
	}
?>