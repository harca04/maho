<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>WELCOME TO HONEYGUIDE SYSTEM </p>
<p>PLEASE LOGIN</p>
<form name="form1" method="post" action="ceklogin.php" enctype="multipart/form-data">
<table width="200" border="0">
  <tr>
    <td colspan="2" bgcolor="#FF0000"><?php
	  	$err = $_REQUEST["err"];
		if($err!=null)echo $err;
	  ?></td>
  </tr>
  <tr>
    <td><strong>Username</strong></td>
    <td><input type="text" name="myusername" id="myusername"></td>
  </tr>
  <tr>
    <td><strong>Password</strong></td>
    <td><input type="text" name="mypassword" id="mypassword"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit"></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>