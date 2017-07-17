<?php
	session_start();
	if (!isset($_SESSION['id_admin'])){
		echo"<script>location='../index.php'</script>";
	} else {
?>
<html>
	<head>
		<title>websidex rumahboneka</title>
		<style>
			a {
				font-family:Verdana, Arial, Helvetica, sans-serif;
				font-size:12px;
				text-decoration:none;
				color:#333333;	
			}
			a:hover {
				color:#990000;	
				text-decoration:underline;
			}
			#menu {
				border:1px solid #666666; 	
			}
			#footer {
				font-size:13px;
			}
		</style>
	</head>
	<body>
	<table width="900" border="0" align="center" cellpadding="2" cellspacing="0" id="menu">
      <tr>
        <td height="170" valign="bottom" background="header.png">Admin Site</td>
      </tr>
      <tr>
        <td bgcolor="D4D0C8"><table width="600" height="29" border="0" cellpadding="2" cellspacing="0" id="menu">
          <tr>
            <td width="136" align="center"><a href="?link=katalog_edit">Katalog</a> </td>
            <td width="101" align="center"><a href="?link=transaksi">Transaksi</a></td>
            <td width="100" align="center"><a href="?link=guestbook">Guest Book</a></td>
            <td width="137" align="center"><a href="?link=kontak">Kontak Kami Viewer</a> </td>
            <td width="137" align="center"><a href="?res=out">Logout</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top" style="padding:10px;">
		<?php if ($_REQUEST['link']=='katalog_edit') {
			require_once("katalog.php");
		 } if ($_REQUEST['link']=='transaksi') {
			require_once("transaksi.php");
		 } if ($_REQUEST['link']=='guestbook') {
			require_once("guestbook.php");
		 } if ($_REQUEST['link']=='kontak') { 
			require_once("kontakkami.php");
		 } ?>		
		 </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="D4D0C8" id="footer">&copy; RumahBoneka.com 2014</td>
      </tr>
    </table>
	</body>
</html> 
<?php } 
	if ($_REQUEST['res']=="out") {
		session_start();
		session_unregister('id_admin');
		echo "<script>location='../index.php';</script>";
		exit;
	}
?>
