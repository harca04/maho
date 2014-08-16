<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "carihij1_hg";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Gak bisa connect database bray!");
mysql_select_db($mysql_database, $bd) or die("Gak bisa milih database bray !");
?>