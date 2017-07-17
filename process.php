<?php
session_start();
require_once("config.php");
if ($_REQUEST['request_kode'] != "" || $_REQUEST['request_kode'] != null) {
	
	$sqlStok = mysql_query('select * from katalog where kode_barang="'.$_REQUEST['request_kode'].'" ') or die (''.mysql_error());
	$dataStok = mysql_fetch_array($sqlStok);
	
	if ($dataStok['stok'] == 0){
		echo "<script>alert('Maaf, stock saat ini sedang habis');history.go(-1)</script>";
	} else {
		$sqlCart = mysql_query('select * from pesan_temp where id_barang="'.$dataStok['id'].'" and id_user="'.$_SESSION['id'].'" ') or die (''.mysql_error());
		$rowCart = mysql_num_rows($sqlCart);
		
		if ($rowCart == 0) {
			mysql_query('insert into pesan_temp values ("NULL", "'.$dataStok['id'].'", "'.$_SESSION['id'].'",1) ') or die (''.mysql_error());
		} else {
			mysql_query('update pesan_temp set jumlah = jumlah + 1 where id_user = "'.$_SESSION['id'].'" and id_barang="'.$dataStok['id'].'" ') or die (''.mysql_error());
		}
		echo"<script>location='index.php?go=mycart'</script>";
	}

} else if ($_REQUEST['checkout'] == "update_list") {
	$idh			= $_POST['idh'];
	$jml_data 		= count($idh);
	$jumlah			= $_POST['jumlah'];
	for ($i=0; $i < $jml_data; $i++){
		mysql_query('update pesan_temp set jumlah="'.$jumlah[$i].'" where id_pesan_temp = "'.$idh[$i].'" ') or die(''.mysql_error());
	}
	echo"<script>location='index.php?go=mycart'</script>";

} else if ($_REQUEST['checkout'] == "payment") {
	$sql =  mysql_query("select id_pesan from pesan order by id_pesan desc limit 0,1 ") or die (''.mysql_error());
	$cek = mysql_num_rows($sql);

	if ($cek==0 || $cek==""){
		$nomor = "NC0001";
	} else { 
		$data = mysql_fetch_row($sql);
		$lastno = $data[0];
		$nolast = substr($lastno,3,4);
		
		$nomor = $nolast + 1;
		$jmlDigit = strlen($nomor);
		
		if($jmlDigit<4)	{
			$zero = '';
			for ($dgt=0;$dgt<(4-$jmlDigit);$dgt++) {
				$zero .= '0';
			}
		} else {
			$zero = '';
		}
		$nomor = 'NC'.$frontFormatString.$zero.$nomor;
	}

	$sqltemp = mysql_query('SELECT
		pesan_temp.id_pesan_temp,
		pesan_temp.id_barang,
		pesan_temp.id_user,
		pesan_temp.jumlah,
		katalog.harga,
		katalog.stok
		FROM
		katalog
		INNER JOIN pesan_temp ON katalog.id = pesan_temp.id_barang 
		where pesan_temp.id_user="'.$_SESSION['id'].'" ')or die(''.mysql_error());
	
							
		$sqlorder = mysql_query('insert into pesan set id_pesan="'.$nomor.'",
								id_user="'.$_SESSION[id].'",
								status_pesan="PESAN",
								total_harga="'.$total_harga.'",
								tanggal_pesan="'.$tanggal.'" ')or die(''.mysql_error());
	
	if ($sqlorder) {
		while ($datatemp = mysql_fetch_array($sqltemp)) {
		$jumlah = $datatemp['jumlah'];
		$harga  = $datatemp['harga'];
		$subtotal = $jumlah * $harga;
		$total_harga = $total_harga + $subtotal;
		
		mysql_query('insert into pesan_detail set id_pesan="'.$nomor.'",
					id_barang="'.$datatemp['id_barang'].'",
					jumlah="'.$datatemp['jumlah'].'",
					harga="'.$datatemp['harga'].'" ') or die(''.mysql_error());
					
		mysql_query("update katalog set stok = stok-$datatemp[jumlah] where id='$datatemp[id]' ")or die(''.mysql_error());											
		mysql_query('delete from pesan_temp where id_user = "'.$_SESSION['id'].'" ') or die(''.mysql_error());
		}
		mysql_query('update pesan set total_harga="'.$total_harga.'" where id_pesan="'.$nomor.'" and id_user="'.$_SESSION['id'].'" ')or die(''.mysql_error());
		echo"<script>location='index.php?go=payment_confirm'</script>";
	}
	else{
		echo "<script>alert('gagal');history.go(-1)</script>";
	}
} else if ($_REQUEST['request_id_pesan'] != "" || $_REQUEST['request_id_pesan'] != null) {
	$getData = mysql_query('select pesan.id_pesan,
							user.nama_depan, 
							user.nama_belakang 
							from pesan 
							inner join user on pesan.id_user = user.id_user where pesan.id_pesan = "'.$_REQUEST['request_id_pesan'].'"')or die(''.mysql_error());
	$getArrData = mysql_fetch_array($getData);
	echo $getArrData[id_pesan]."||".$getArrData[nama_depan]." ".$getArrData[nama_belakang];
	
} else if ($_REQUEST['reqDel'] != "" || $_REQUEST['reqDel'] != null) { 
	mysql_query('delete from pesan_temp where id_pesan_temp="'.$_GET['reqDel'].'" ');
	echo"<script>location:history.go(-1);</script>";
}
?>
