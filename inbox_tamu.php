<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style/core.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="280" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <?
    mysql_connect("localhost","root","admin") or die ("fail connection");
	mysql_select_db("e_commerce") or die ("fail database");
	$vc=mysql_query("select * from buku_tamu order by tamu_id desc"); 
		while($cv=mysql_fetch_array($vc)){
	?>
    <td width="4%" class="list-grade">nama</td>
    <td width="1%" align="center" >:</td>
    <td width="95%" class="detail-seleksi"><?=$cv[nama]?></td>
  </tr>
  <tr>
    <td class="list-grade">email</td>
    <td align="center" >:</td>
    <td class="text-bs">&nbsp;<a href="mailto:<?=$cv[email]?>" class="other"><?=$cv[email]?>
    </a></td>
  </tr>
  <tr>
    <td valign="top" class="list-grade">pesan</td>
    <td align="center" valign="top">:</td>
    <td valign="top" class="detail-seleksi"><?=$cv[pesan]?>
        <? echo"<img src='emo/$cv[emoticon]'"; ?></td>
  </tr>
  <tr>
    <td valign="top" class="list-grade">Dikirim</td>
    <td align="center" valign="top">&nbsp;</td>
    <td valign="top" class="detail-seleksi"><?=$cv[waktu]?></td>
  </tr>
  <tr>
    <td colspan="3"><hr noshade="noshade" /></td>
  </tr>
  <? } ?>
</table>
</body>
</html>
