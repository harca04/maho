<?php
$con = mysql_connect("localhost","carihij1_uhg","balon");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('carihij1_hg.member', $con);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
?>