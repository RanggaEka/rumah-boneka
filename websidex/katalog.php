<link href="../style/core.css" rel="stylesheet" type="text/css" />
<link href="../style/all_core.css" rel="stylesheet" type="text/css" />
<link href="../style/core_profil.css" rel="stylesheet" type="text/css" />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td colspan="2" class="textsedangabu"><img src="../pic/icon/pdc/32x32/archives.png" width="32" height="32" align="absmiddle" /> Katalog Editor </td>
    </tr>
    <tr>
      <td width="163" class="other_indi">Kode Barang </td>
      <td width="629"><input name="textfield" type="text" class="textboxlogin" /></td>
    </tr>
    <tr>
      <td class="other_indi">Nama Barang </td>
      <td><input name="textfield2" type="text" class="textboxlogin" /></td>
    </tr>
    <tr>
      <td class="other_indi">Stok</td>
      <td><input name="textfield3" type="text" class="textboxlogin" /></td>
    </tr>
    <tr>
      <td class="other_indi">Harga</td>
      <td><input name="textfield4" type="text" class="textboxlogin" /></td>
    </tr>
    <tr>
      <td class="other_indi">Image</td>
      <td><input name="file" type="file" class="textboxlogin" /></td>
    </tr>
    <tr>
      <td class="other_indi">Kategori</td>
      <td><select name="kategori" class="textboxlogin" id="kategori">
			<option selected="selected" value="All Item">..... </option>
			<option value="hewan">Seri Hewan</option>
			<option value="figure">Seri Action Figure</option>
			<option value="love">Seri Love</option>
			</select>	  </td>
    </tr>
    <tr>
      <td class="other_indi">Deskripsi</td>
      <td><textarea name="textarea" class="textboxlogin2"></textarea></td>
    </tr>
    <tr>
      <td class="other_indi">Best Seller ? </td>
      <td><input type="checkbox" name="checkbox" value="checkbox" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" class="button" value="Submit" /></td>
    </tr>
  </table>
</form>
 
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="7%" class="searching">ID_Barang</td>
    <td width="14%" class="searching">Kode Barang </td>
    <td width="19%" class="searching">Nama Barang </td>
    <td width="3%" class="searching">Stok</td>
    <td width="8%" class="searching">Harga</td>
    <td width="11%" class="searching">Image</td>
    <td width="11%" class="searching">Kategori</td>
    <td width="18%" class="searching">Deskripsi</td>
    <td width="9%">&nbsp;</td>
  </tr>
  <?php 
  	require_once("../config.php"); 
  	$getAll = mysql_query("select * from katalog order by id desc");
	while($getArr=mysql_fetch_array($getAll)) {
  ?>
  <tr>
    <td valign="top"><?=$getArr['id']?></td>
    <td valign="top"><?=$getArr['kode_barang']?></td>
    <td valign="top"><?=$getArr['nama_barang']?></td>
    <td valign="top"><?=$getArr['stok']?></td>
    <td valign="top"><?=$getArr['harga']?></td>
    <td valign="top"><img src="../<?=$getArr['file']?>" width="100px"/></td>
    <td valign="top"><?=$getArr['kategori']?></td>
    <td valign="top"><?=$getArr['deskripsi']?></td>
    <td valign="top"><a href="#" class="text-bq">edit</a> || <a href="#" class="text-bq">hapus</a></td>
  </tr>
  <?php } ?>
</table>
