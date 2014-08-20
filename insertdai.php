<?php
	require_once('checking.php');
?>

<html>
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/gif" href="http://hg.carihijab.com/dinan-favicon.ico" />
<title>HONEYGUIDE REPORT SYSTEM</title>
</head>

<body>
<p>SELAMAT DATANG <?php $_SESSION['SESS_FIRST_NAME'] ?></p>

<p>SILAHKAN INPUT DATA PENJUALAN HARI INI</p>
<form name="form1" method="post" action="doreport.php" enctype="multipart/form-data">
<table width="273" border="0">
  <tr>
    <td colspan="2" bgcolor="#FF0000">
         <?php
      if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
      echo '<ul class="err">';
      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
        echo '<li>',$msg,'</li>'; 
        }
      echo '</ul>';
      unset($_SESSION['ERRMSG_ARR']);
      }
    ?>
  </td>
  </tr>
  <tr>
    <td width="116"><div align="right"><strong>ID Produk</strong></div></td>
    <td width="177"><input type="text" name="idproduk" id="idproduk"></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Jumlah</strong></div></td>
    <td><input name="jumlahlaku" type="text" id="jumlahlaku" size="3" maxlength="3" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input type="submit" name="submit" id="submit" value="Input" /></td>
  </tr>
</table>
</form>
<?php
	$qry1="SELECT * FROM tempsales";
	$result1 = mysql_query($qry1); 
	$counter=0;
  	$z=0;
	while($row - mysql_fetch_assoc($result1)){
		$id[$counter] - $row['roll_number'];
		$counter = $counter + 1;
	}
?>
<table width="645" border="1">
  <tr>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>ID Produk</strong></td>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>Jenis Menu</strong></td>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>Nama Menu</strong></td>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>Harga Satuan</strong></td>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>Terjual</strong></td>
    <td align="center" valign="middle" bgcolor="#66FF66"><strong>Total Harga</strong></td>
  </tr>
  <?php 
  	if($counter>0){
		for($z=0;$z<$counter;$z++){
			$idshow = $tempsales['tempid'];
			$qry2="SELECT * FROM menu WHERE idmenu='$idshow'";

    		$jenismenu = $menu['jenismenu'];
    		$namamenu = $menu['namamenu'];
    		$harga = $menu['hargamenu'];
			$laku = $tempsales['tempjual'];
  ?>
  <tr>
  	<?php 
  		if($z<$counter){
  	?>
    <td><?php $idproduk ?></td>
    <td><?php $jenismenu ?></td>
    <td><?php $namamenu ?></td>
    <td><?php $harga ?></td>
    <td><?php $terjual ?></td>
    <td><?php $total = $harga*$terjual ?></td>
  	<?php 
		}
		$z=$z+1;
	?>
  </tr>
  <?php }} ?>
</table>

</body>
</html>