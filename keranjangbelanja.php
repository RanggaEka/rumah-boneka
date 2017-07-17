<script>
	function validQty(txtbel, qty) {
		console.log(txtbel)
		console.log(qty)
		var txtBeli = document.getElementById("jumlah"+txtbel).value;
		var clear = function() {
			document.getElementById("jumlah"+txtbel).value = "";
		}
		if (txtBeli != "") {
			if (isNaN(parseInt(txtBeli))) { 
				alert('isi harus angka !');
				setTimeout(clear,300);
			} else {
				if (parseInt(txtBeli) > qty) {
					alert('qty beli melebihi batas stok !');
					setTimeout(clear,300);
				} else if (parseInt(txtBeli) == 0) {
					alert('qty beli tidak boleh 0 !');
					setTimeout(clear,300);
				} 
			}
		}
	}
</script>
<?php
require_once("config.php");
function format_rupiah($angka){
	$rupiah = number_format($angka,0,',','.');
	return $rupiah;
}
$sqlshop = mysql_query('select
	pst.id_pesan_temp,
	pst.id_barang,
	pst.id_user,
	pst.jumlah,
	kt.id,
	kt.harga,
	kt.kode_barang,
	kt.nama_barang,
	kt.stok
	from pesan_temp pst
	inner join katalog kt on pst.id_barang = kt.id 
	where pst.id_user = "'.$_SESSION['id'].'" ') or die(''.mysql_error());
?>
<link href="style/core.css" rel="stylesheet" type="text/css" />


<link href="style/all_core.css" rel="stylesheet" type="text/css" />
<form action="process.php?checkout=update_list" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="1">
		<tr>
		  <td height="34" colspan="7" valign="top" class="title-art"><span class="title-text"><img src="pic/icon/pdc/32x32/basket.png" width="32" height="32" align="absbottom" /><span class="judul-admin"> My Cart</span></span><hr noshade="noshade"/></td>
	  </tr>
		<tr>
			<td width="5%" class="title-art">No</td>
			<td width="38%" class="title-art">Nama Barang</td>
			<td width="9%" align="center" class="title-art">Stok</td>
			<td width="18%" class="title-art">Jumlah</td>
			<td width="18%" class="title-art">Harga</td>
			<td width="20%" class="title-art">Subtotal</td>
			<td width="10%" class="title-art">Hapus</td>
		</tr>
			<?php
				$no = 1;
				while ($datashop = mysql_fetch_array($sqlshop)) {
				$subtotal		= $datashop['harga'] * $datashop['jumlah'];
				$total			= $total + $subtotal;
				$subtotal_rp	= format_rupiah($subtotal);
				$total_rp		= format_rupiah($total);
				$harga_rp		= format_rupiah($datashop['harga']);
			?>
		<tr>
			<td valign="middle" class="login"><?=$no?><?php echo "<input type='hidden' name='idh[]' value='$datashop[id_pesan_temp]'>"; ?></td>
			<td valign="middle" class="login"><?=$datashop['nama_barang']?></td>
			<td align="center" valign="middle" class="login"><?=$datashop['stok']?></td>
			<td align="right" valign="middle" class="login"><?php echo "<input name='jumlah[]' id='jumlah$no' onkeyup='validQty($no,$datashop[stok])' type='text' value='$datashop[jumlah]' >"; ?></td>
			<td align="right" valign="middle" class="login"><?=$harga_rp?></td>
			<td align="right" valign="middle" class="login"><?=$subtotal_rp?></td>
			<td align="center" valign="middle" class="login"><a href="process.php?reqDel=<?=$datashop['id_pesan_temp']?>" class="text-bq">Hapus</a></td>
		</tr>
		<?php $no++; } ?>
		<tr>
			<td colspan="5" class="title-art">Total Rp.</td>
			<td align="right"><font color="#FF0000"><?=$total_rp?></font></td>
			<td align="center"><input type="image" src="pic/icon/pdc/16x16/refresh.png" class="image"></a></td>
		</tr>
		<tr>
			<td height="41" colspan="7" align="right" bgcolor="#CCCCCC">
				<a href="?go=katalog" class="text-bq">Belanja lagi?</a>
				&nbsp; || &nbsp; <a href="process.php?checkout=payment" class="text-bq">Check Out</a>&nbsp;			</td>
		</tr>
  </table>
	
</form>
</div>
