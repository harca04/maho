<?php
  session_start();  
  unset($_SESSION['SESS_MEMBER_ID']);
  unset($_SESSION['SESS_FIRST_NAME']);
  unset($_SESSION['SESS_LAST_NAME']);
?>

<html>
<head>
<meta charset="utf-8">
<title>HONEYGUIDE MAHO SYSTEM</title>
</head>

<body>
<p>WELCOME TO HONEYGUIDE SYSTEM </p>
<p>PLEASE LOGIN</p>
<form name="form1" method="post" action="ceklogin.php" enctype="multipart/form-data">
<table width="200" border="0">
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
    <td width="116"><div align="right"><strong>Username</strong></div></td>
    <td width="177"><input type="text" name="myusername" id="myusername"></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Password</strong></div></td>
    <td><input type="password" name="mypassword" id="mypassword"/></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
  </tr>
</table>
</form>
</body>
</html>