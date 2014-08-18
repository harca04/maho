<?php
	require_once('checking.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>Honeyguide Supervisor Page</p>
<p>Supervisor On Duty : <?php $_SESSION['SESS_FIRST_NAME'] ?></p>
<p>&nbsp;</p>
<table width="200" border="0">
  <tr>
    <td>Insert Daily Report</td>
    <td><a href="insertdai.php"><input type="button" name="button" id="button" value="Go"></a></td>
  </tr>
  <tr>
    <td>Delete Daily Report</td>
    <td><input type="button" name="button2" id="button2" value="Go"></td>
  </tr>
  <tr>
    <td>View Sales</td>
    <td><input type="button" name="button3" id="button3" value="Go"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>