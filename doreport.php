<?php
	session_start();
 	require_once('koneksi.php');
	$errmsg_arr = array();
 	$errflag = false;
 
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
 
	if($result){
		if(mysql_num_rows($result) > 0) {
			$qry2="INSERT INTO tempsales VALUES('$idproduk','$jumlahlaku')";
			
			header("location: insertdai.php");
			exit();
		}else{
			$errmsg_arr[] = 'gak ada menu dengan nomer itu coy';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: insertdai.php");
				exit();
			}
		}
	}else{
		die("lu kaco banget bray !!!");
	}
?>