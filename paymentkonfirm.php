<script>
function getXhrKonfirmasiID(idS) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  xmlhttp=new XMLHttpRequest();
	} else  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		var text = xmlhttp.responseText;
			var splitText = text.split("||");
			document.getElementById("hdnIdPesan").value = splitText[0];
			document.getElementById("hdnNama").value = splitText[1];
			document.getElementById("getInvNumber").innerHTML = splitText[0];
			document.getElementById("getInvNama").innerHTML = splitText[1];
			document.getElementById('divSlideTextKonfirmasi').style.visibility = "visible";
			setTimeout(function(){
				document.getElementById("divSlideTextKonfirmasi").style.opacity = 1;
			},500);
	  }
	}
	xmlhttp.open("GET","process.php?request_id_pesan="+idS,true);
	xmlhttp.send();
}
</script>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link href="style/core.css" rel="stylesheet" type="text/css" />

<div class="box">
	<div id="myDiv"></div>
	<span class="head2">Daftar Belanja</span><br/>
	<?php
		session_start();
		require_once("config.php");
		function format_rupiah($angka){
			$rupiah = number_format($angka,0,',','.');
			return $rupiah;
		}
		$sql = mysql_query('select * from pesan where id_user="'.$_SESSION['id'].'" ');
		while($data = mysql_fetch_array($sql)) {
		$total_rp =  format_rupiah($data['total_harga'])
	?>
	<div class="head3">
		No Invoice : <?=$data['id_pesan']?>  
		| 
		<?php if($data['status_pesan'] == "LUNAS") {
			echo "Transaksi sudah lunas !";
		} else { ?>
			<a href="#" onClick="getXhrKonfirmasiID('<?=$data['id_pesan']?>')" class="text-bq">Update Pembayaran</a>
		<?php } ?>
		|
		<a href="cetakinvoice.php?id=<?=$data['id_pesan']?>" target="_blank" class="text-bq">Cetak Invoice</a>
	<br/>
	<span class="isi">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="5%">No</td>
			<td width="38%">Nama Barang</td>
			<td width="9%">Jumlah</td>
			<td width="18%">Harga</td>
			<td width="20%">Subtotal</td>
		</tr>
		<?php
			$no=1;
			$sql2 = mysql_query("SELECT
				pesan_detail.id_pesan,
				pesan_detail.id_barang,
				pesan_detail.jumlah,
				pesan_detail.harga,
				katalog.nama_barang
				FROM
				katalog
				INNER JOIN pesan_detail 
				ON katalog.id = pesan_detail.id_barang where id_pesan='$data[id_pesan]' ");
			while($data2=mysql_fetch_array($sql2)){
			$subtotal		= $data2['harga'] * $data2['jumlah'];
			$subtotal_rp	= format_rupiah($subtotal);
			$harga_rp		= format_rupiah($data2['harga']);
		?>
		<tr>
			<td valign="top" class="cart"><?=$no?></td>
			<td valign="top" class="cart"><?=$data2['nama_barang']?></td>
			<td valign="top" class="cart"><?=$data2['jumlah']?></td>
			<td align="right" valign="top" class="cart"><?=$harga_rp?></td>
			<td align="right" valign="top" class="cart"><?=$subtotal_rp?></td>
		</tr>
		<?php $no++; } ?>
		<tr>
			<td colspan="4" class="total">Total Rp.</td>
			<td align="right" class="cart"><font color="#FF0000"><?=$total_rp?></font></td>
		</tr>
	</table>
	</span>
	<?php } ?>
</div> 
