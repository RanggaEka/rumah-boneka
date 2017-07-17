<style type="text/css">
#btnLogin {				
	background-color:#D4D0C8;
	border:1px #999999 solid;
	width:100px;
	height:25px;
}
#login {	
	border:1px solid #666666; 
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
#title {	
	font-size:15px;
}
</style>
<br/><br/><br/><br/><br/><br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="0" align="center" cellpadding="3" cellspacing="0" id="login">
    <tr>
      <td height="45" colspan="2" align="center" bgcolor="#D4D0C8"><img src="login.png"/><br/>
      cPanel</td>
    </tr>
    <tr>
      <td width="200" align="right">Username</td>
      <td width="282">:
        <input name="txtUser" type="text" id="txtUser" /></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td>:
        <input name="txtPassword" type="password" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="btnLogin" type="submit" id="btnLogin" value="Login" /></td>
    </tr>
  </table>
</form>
<?php
if (isset($_POST['btnLogin'])){
	require_once("config.php");
	function cek_form($cek){
		$filter = mysql_real_escape_string($cek);
		return $filter;
	}

	$txtuser=cek_form($_POST['txtUser']);
	$txtpass=cek_form(md5($_POST['txtPassword']));
	
	if (empty($txtpass) || empty($txtuser)){
		echo "<script>alert('isi semua field');location='security.php'</script>";
	}
	else{
		if (!ctype_alnum($txtuser) OR !ctype_alnum($txtpass)){
			echo "<script>alert('anda memasukan karakter yang salah');location='security.php'</script>";
		}
		else{
			$login=mysql_query("select * from admin where username='$txtuser' and password='$txtpass'  ");
			$ketemu=mysql_num_rows($login);
			$tampil=mysql_fetch_array($login);
	
			if ($ketemu > 0){
				session_start();
				session_register("id_admin");
				$_SESSION['id_admin']=$tampil['id_admin'];
				
				echo"<script>location='websidex/index.php';</script>";
			}
			else{
				echo "<script>alert('Username dan password salah');location='security.php'</script>";
			}
		}
	}
}
?>
