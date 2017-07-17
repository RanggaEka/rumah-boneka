<?php
	session_start();
	if (empty($_SESSION['id'])) header('location:index.php');
	require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cetak Invoice</title>
	<style type="text/css">
		table tr td {
			padding-right: 5px;
			padding-left: 5px;
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 11px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		.all {
			border: 1px solid #333;
		}
		.invoice h2 {
			color: #F00;
			font-weight: bold;
		}
		th {
			padding-top: 5px;
			padding-bottom: 5px;
			background-color: #ECECEC;
		}
	</style>
</head>

<body>
	<?php
		function format_rupiah($angka){
			$rupiah = number_format($angka,0,',','.');
			return $rupiah;
		}
		$sql = mysql_query('select * from pesan where id_pesan="'.$_GET['id'].'" and id_user="'.$_SESSION['id'].'" ');
		$data = mysql_fetch_array($sql);
		$total = format_rupiah($data['total_harga']);

		$sql2 = mysql_query('select * from user where id_user="'.$_SESSION['id'].'" ');
		$data2 = mysql_fetch_array($sql2);
	?>
	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="all">
	  <tr>
		<td valign="top"><table width="800" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="251" rowspan="2" align="center" valign="top" class="logo"><img src="pic/toko-boneka-lucu-murah-online.png" alt="Nadera" width="100%" /></td>
			<td width="549" align="center" valign="top" class="namatoko"><h1>RUMAH BONEKA.COM </h1></td>
		  </tr>
		  <tr>
			<td align="center" valign="top" class="alamattoko">Jl.Raden saleh, Perum Kemang Swatama C 23A Depok<br>
		    No.telp : 0898 - 878 - 1062 </td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="40%" rowspan="4" valign="top" class="invoice"><h2>No. INVOICE : <?=$data['id_pesan']?><br>
			  STATUS PESAN : *<?=$data['status_pesan']?>*</h2></td>
			<td width="18%" valign="top">Nama Pembeli</td>
			<td width="42%" valign="top"><?=$data2['nama_depan']?>&nbsp;<?=$data2['nama_belakang']?></td>
		  </tr>
		  <tr>
			<td valign="top">Email</td>
			<td valign="top"><?=$data2['email']?></td>
		  </tr>
		  <tr>
			<td valign="top">Alamat</td>
			<td valign="top"><?=$data2['alamat']?></td>
		  </tr>
		  <tr>
			<td valign="top">Telp.</td>
			<td valign="top"><?=$data2['telepon']?></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td valign="top"><table width="800" border="1" cellspacing="0" cellpadding="0">
		  <tr>
			<td colspan="5" class="kepala">Daftar Order</td>
			</tr>
		  <tr>
			<th width="43">No</th>
			<th width="377">Nama Barang</th>
			<th width="79">Jumlah</th>
			<th width="137">Harga</th>
			<th width="164">Subtotal</th>
		  </tr>
		  <?php
				$no=1;
				$sql3 = mysql_query('SELECT
					pesan_detail.id_pesan,
					pesan_detail.id_barang,
					pesan_detail.jumlah,
					pesan_detail.harga,
					katalog.nama_barang
					FROM
					katalog
					INNER JOIN pesan_detail 
					ON katalog.id = pesan_detail.id_barang where id_pesan= "'.$data[id_pesan].'" ');
				while ($data3 = mysql_fetch_array($sql3)){
				$subtotal		= $data3['harga'] * $data3['jumlah'];
				$subtotal_rp	= format_rupiah($subtotal);
				$harga_rp		= format_rupiah($data3['harga']);
		  ?>
		  <tr>
			<td valign="top"><?=$no?></td>
			<td valign="top"><?=$data3['nama_barang']?></td>
			<td valign="top"><?=$data3['jumlah']?></td>
			<td align="right" valign="top"><?=$harga_rp?></td>
			<td align="right" valign="top"><?=$subtotal_rp?></td>
		  </tr>
		  <?php $no++; }?>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Total Rp.</td>
			<td align="right"><?=$total?></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td valign="top" class="copy">* copyright &copy; RumahBoneka.Com</td>
	  </tr>
	</table>
</body>
</html>
