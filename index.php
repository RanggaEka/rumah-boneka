<?php
session_start();
$year=date('Y');
require_once("config.php");
?>
<html>
	<head>
		<link href="style/hidden-visible.css" rel="stylesheet" type="text/css">
		<link href="pic/icon/icon.gif" rel="icon" />
		<link href="js-external.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style/superfish.css">
			<script type="text/javascript" src="js/jquery-1.4.js"></script>
			<script type="text/javascript" src="js/hoverIntent.js"></script>
			<script type="text/javascript" src="js/superfish.js"></script>
			<script type="text/javascript">
			
		<script type="text/javascript">
		  $(document).ready(function(){
				   jQuery('ul.sf-menu').superfish();
			  });
		</script>
		<script>
			function closeGate() {
				document.getElementById("divSlideTextKonfirmasi").style.opacity = 0;
			}
		</script>
		<style>
			#footer {
				font-family:Verdana, Arial, Helvetica, sans-serif;
				font-size:10px;
				color:#FFFFFF;
			}
			
			#keranjangBelanja{
				position:fixed;
				top:-4px;
				right:-4px;
				width:100%;
				height:40px;
				border: 1px solid rgba(255, 255, 255, 0.9);
				border-radius:5px;
				background-color: rgba(255, 255, 255, 0.9);
                background: rgba(255, 255, 255, 0.9);	
			}
			
			#divSlide {
				padding-top: 14px;
				padding-left:20px;
				font-family:Verdana, Arial, Helvetica, sans-serif;
				font-size:14px;
				color:#FFFFFF;
				position:fixed;
				bottom:20px;
				left:-1px;
				width:300;
				height:30px;
				visibility:hidden;
				background:red;
				-webkit-transition: opacity 0.2s ease-in;
				-moz-transition: opacity 0.2s ease-in;
				-o-transition: opacity 0.2s ease-in;
				opacity:0;
			}
			#divSlide.fade-in{
				opacity:1;
			}
			#divSlideTextKonfirmasi {
				padding-top: 1px;
				padding-left:1px;
				position:fixed;
				bottom:20px;
				left:-1px;
				width:400px;
				height:auto;
				visibility:hidden;
				background:red;
				-webkit-transition: opacity 0.2s ease-in;
				-moz-transition: opacity 0.2s ease-in;
				-o-transition: opacity 0.2s ease-in;
				opacity:0;
			}
			#body_right{
				position:fixed;
				right:-220px;
				top:39px;
				cursor:pointer;
			}
			#body_right:hover{
				right:-5px;
			}
			#b-shoutbox{
				border:1px solid #999999;
			}
		</style>
	<title>RumahBoneka.com</title>
	<link href="style/core.css" rel="stylesheet" type="text/css">
	<link href="style/core_profil.css" rel="stylesheet" type="text/css">
	<link href="style/all_core.css" rel="stylesheet" type="text/css">
	</head>
	<body bgcolor="#0093D9">
	<br/>
	<br/>
	<div id="divSlide"></div>
	<div id="divSlideTextKonfirmasi">
		<form action="" method="post" enctype="multipart/form-data" name="form4">
	    <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td colspan="2" align="right"><a href="#" onClick="closeGate()"><img src="pic/icon/Free-web-icons/64x64/circle-delete.png" width="25"></a></td>
          </tr>
          <tr>
            <td colspan="2" class="bodycon">Konfirmasi Pembayaran</td>
          </tr>
          <tr>
            <td width="122" class="bodytitle">No Invoice 
            <input name="hdnIdPesan" type="hidden" id="hdnIdPesan"></td>
            <td width="269" class="bodytitle"><div id="getInvNumber"></div></td>
          </tr>
          <tr>
            <td class="bodytitle">Nama
            <input name="hdnNama" type="hidden" id="hdnNama"></td>
            <td class="bodytitle"><div id="getInvNama"></div></td>
          </tr>
          <tr>
            <td class="bodytitle">Bank</td>
            <td><select name="txtBank" id="txtBank">
              <option value="BCA">BCA</option>
              <option value="Mandiri">Mandiri</option>
              <option value="BRI">BRI</option>
              <option value="CIMB Niaga">CIMB Niaga</option>
            </select>
            </td>
          </tr>
          <tr>
            <td class="bodytitle">Rekening</td>
            <td><input name="txtRekening" type="text" id="txtRekening"></td>
          </tr>
          <tr>
            <td class="bodytitle">File</td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="btnKonfirm" type="submit" class="login" id="btnKonfirm" value="Process"></td>
          </tr>
        </table>
      </form>
    </div>
	<br/>
	<div style="width:1000px;margin-left:auto;margin-right:auto;background:#FFFFFF;padding:4px; border:1px solid #FFFFFF; border-radius:5px; ">
	<?php require_once("ajax_baner.php") ?>
	<table width="100%" height="50px" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" class="divbox"><a href="?go" class="white">RumahBoneka</a></td>
        <td align="center" class="divbox"><a href="?go=katalog" class="white">Katalog Boneka</a> </td>
        <td align="center" class="divbox"><a href="?go=carapesan" class="white">Cara Belanja</a> </td>
        <td align="center" class="divbox"><a href="?go=kontakkami" class="white">Kontak Kami</a> </td>
      </tr>
    </table>
	<table width="990" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="2" align="right" valign="top"></td>
      </tr>
      <tr>
        <td width="626" valign="top">
		<?php 
			if ($_REQUEST['go']=="register") {
		?>
	  <form name="form2" method="post" action="">
	  <br/>
		<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr>
		    <td colspan="2" valign="middle" class="title-text"><img src="pic/icon/Free-web-icons/64x64/user-add.png" width="35" align="absbottom"><span class="judul-admin">Register Akun</span> <hr noshade="noshade"/></td>
		    </tr>
		  <tr>
			<td width="192" valign="top" class="textsedangabukecil">Nama Awal <font color="red"/></td>
		    <td width="282" valign="top"><input name="txtNamaDepan" type="text" class="textboxlogin" id="txtNamaDepan">
		      <font color="red">* </font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Nama Akhir </td>
	        <td valign="top"><input name="txtNamaBelakang" type="text" class="textboxlogin" id="txtNamaBelakang">
	          <font color="red">* </font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Email</td>
	        <td valign="top"><input name="email" type="text" class="textboxlogin" id="email">
	          <font color="red">* </font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Alamat</td>
		    <td valign="top"><textarea name="txtAlamat" class="textboxlogin2" id="txtAlamat"></textarea></td>
		    </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Telepon</td>
		    <td valign="top"><input name="txtTelepon" type="text" class="textboxlogin" id="txtTelepon"></td>
		    </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Password</td>
	        <td valign="top"><input name="password" type="password" class="textboxlogin" id="password">
	          <font color="red">* </font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Confirm Password </td>
	        <td valign="top"><input name="konfPass" type="password" class="textboxlogin" id="konfPass">
	          <font color="red">* </font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Tanggal Lahir </td>
	        <td valign="top">
			<select name="tanggal" class="bahasa" id="tanggal">
                <option>Tanggal</option>
                <?php
				  for($i=1;$i<=31;$i++){
				  if($i>=10)
				  {
				  $i="$i";
				  }
				  else
				  {
				  $i="0$i";
				  }
				  ?>
                <option <?php echo $i; ?>><?php echo $i; ?></option>
                <?php } ?>
              </select>
              - 
              <select name="bulan" class="bahasa" id="bulan">
             <option value="januari">Bulan</option>
			  <option value="januari">Januari</option>
              <option value="februari">Februari</option>
              <option value="maret">Maret</option>
              <option value="april">April</option>
              <option value="mei">Mei</option>
              <option value="juni">Juni</option>
              <option value="juli">Juli</option>
              <option value="agustus">Agustus</option>
              <option value="september">September</option>
              <option value="oktober">Oktober</option>
              <option value="november">November</option>
              <option value="desember">Desember</option>
            </select>
            -
            <select name="tahun" class="bahasa" id="tahun">
                <option>Tahun</option>
                <?php
				  for($i=1950;$i<=($year-17);$i++){
				  ?>
                <option <?php echo $i; ?>><?php echo $i; ?></option>
                <?php } ?>
              </select> 
            <font color="red">*</font></td>
		  </tr>
		  <tr>
		    <td valign="top" class="textsedangabukecil">Persetujuan Keanggotaan </td>
		    <td valign="top"><textarea name="textarea2" class="textboxlogin2" style="width:400px;"><?php require_once("license.php"); ?>
		    </textarea></td>
	      </tr>
		  <tr>
		    <td valign="middle" class="textsedangabukecil">Masukan Kode berikut </td>
		    <td valign="top">
			<?php echo("<span class='textsedang'>".rand(100,9000)."</span>");?> &nbsp;
				<input name="captcha" type="text" id="captcha">
		      <font color="red">* </font>			  </td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle" class="textsedangabukecil"><input name="isValid" type="checkbox" id="isValid" value="checkbox">
		      Dengan ini saya menyatakan bahwa data yg di isi adalah benar <font color="red">* </font></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="right" valign="top" bgcolor="#999999"><input name="register" type="submit" class="ok_ton" id="register" value="Register">		      <input name="Submit3" type="reset" class="ok_ton" value="Reset"></td>
		    </tr>
		  </table>
      </form>
	<?php 		
			} else if ($_REQUEST['go']=="signin") {
	?>
	<br/>
	<form name="form3" method="post" action="session_login.php">
	  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" valign="middle" class="title-text"><img src="pic/icon/Free-web-icons/64x64/lock-open.png" width="35" align="absbottom"><span class="judul-admin"> Sign In </span>
              <hr noshade="noshade"/></td>
        </tr>
        <tr>
          <td width="192" valign="top" class="textsedangabukecil">Email</td>
          <td width="282" valign="top"><input name="username_post" type="text" class="textboxlogin" id="txtUser">
              <font color="red">* </font></td>
        </tr>
        <tr>
          <td valign="top" class="textsedangabukecil">Password</td>
          <td valign="top"><input name="password_post" type="password" class="textboxlogin" id="txtPassword">
              <font color="red">* </font></td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="middle" class="textsedangabukecil">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="right" valign="top" bgcolor="#999999"><input name="login" type="submit" class="ok_ton" id="login" value="Sign In">
              <input name="Submit32" type="reset" class="ok_ton" value="Reset"></td>
        </tr>
      </table>
        </form>
		<?php 		
			} else if ($_REQUEST['go']=="katalog") {
				require_once("katalog.php");
			} else if ($_REQUEST['go']=="mycart") {
				require_once("keranjangbelanja.php");
			} else if ($_REQUEST['go']=="payment") {
				require_once("payment.php");	
			} else if ($_REQUEST['go']=="payment_confirm") {
				require_once("paymentkonfirm.php");	
			} else if ($_REQUEST['go']=="carapesan") {
		?>
		<div class="text-title">
			<span class="textsedang">1.</span> <span class="textsedangabukecil">Bisa dilakukan dengan cara sistem cart / troli belanja.<br/>
			Anda bisa memilih barang yang akan dibeli, <br/>
			dengan cara klik "Tambahkan ke troli" kemudian anda akan melihat kumpulan barang belanjaan anda di Blok TROLI (Dipojok kanan Atas), <br/>
			setelah anda selesai memilih anda klik tombol "Troli" untuk memastikan rangkuman belanja anda, <br/>
			jika anda mempunyai VOUCHER kode untuk mendapatkan Discount, <br/>
			silakan masukan kode tersebut ke form yang ada, <br/>
			namun jika anda tidak mempunyainya silakan anda klik tombol "selanjutnya" atau tombol "Bayar ke kasir".<br/>
			<br/>
			Jika anda adalah customer baru anda akan diminta untuk mendaftarkan terlebih dahulu <br/>
			dengan cara isi form yang ada dalam Blok "Buat akun anda", kemudian isi form tersebut sampai proses selesai.<br/>
			Sedangkan jika anda merupakan pelanggan lama dan sudah mempunyai account di rumahboneka.com, <br/>
			anda hanya cukup login dengan memasukan alamat email sebagai dan kode sandi di rumahboneka.com,<br/>
			"sandi" adalah password anda yang telah dibuat di rumahboneka.com, <br/>
			dan bukanlah password dari email anda, sehingga keamanan email anda tetap menjadi Privasi pribadi anda.</span><br/>
			<br/>
			<span class="textsedang">2.</span> <span class="textsedangabukecil">Lewat SMS<br/>
			Kirim NAMA BARANG, <br/>
				  HARGA BARANG, <br/>
				  JUMLAH PEMBELIAN, <br/>
				  NAMA ANDA, <br/>
				  ALAMAT ANDA, <br/>
				  NO. TELEPON ANDA, <br/>
				  kirim ke 0812 9009 9621 atau 0856 787 31 58<br/>
				  
			Domestic : 0812 9009 9621 atau 0856 787 31 58<br/>
			International SMS : 62 812 9009 9621 atau +62 856 787 31 58</span><br/>
			<br/>
			<span class="textsedang">3.</span><span class="textsedangabukecil"> Lewat Telepon<br/>
			Sebutkan NAMA BARANG, <br/>
					 HARGA BARANG, <br/>
					 JUMLAH PEMBELIAN, <br/>
					 NAMA ANDA, <br/>
					 ALAMAT ANDA, <br/>
					 NO. TELEPON ANDA, <br/>
					 telepon ke (021) 822 93 58 atau 0812 9009 9621 atau 0856 787 31 58</span><br/>
			<br/>
			<span class="textsedang">4. </span><span class="textsedangabukecil">Lewat E-Mail<br/>
			Sebutkan NAMA BARANG, <br/>
					 HARGA BARANG, <br/>
					 JUMLAH PEMBELIAN, <br/>
					 NAMA ANDA, <br/>
					 ALAMAT ANDA, <br/>
					 NO. TELEPON ANDA, <br/>
					 kirim ke rangga.parkur@gmail.com. <br/>
			Tunggu balasan EMAIL dari kami yang berisi konfirmasi Jumlah total yang harus dibayar <br/>
			(termasuk ongkos kirim) dan informasi nomor rekening bank kami.</span><br/>
		</div>
		<?php	
			} else if ($_REQUEST['go']=="kontakkami") {
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td class="textsedang">SMS or CALL: 081320389592 / 085721601050</td>
          </tr>
          <tr>
            <td class="textsedangabukecil">BBM: 31057741 / 7531de58 </td>
          </tr>
          <tr>
            <td class="textsedangabukecil">Twitter : @Rangga_neoda</td>
          </tr>
          <tr>
            <td class="textsedangabukecil">Email : rangga.parkur@gmail.com</td>
          </tr>
          <tr>
            <td class="textsedangabukecil">Alamat : Jl.Raden saleh, Perum Kemang Swatama C 23A Depok </td>
          </tr>
          <tr>
            <td><form action="" method="post" name="form1" class="text-title">
              Untuk meng-kontak kami melalui email silahkan isi form dibawah ini:
			  <br/>
              Nama : <font color="red">*</font><br/> 
                  <input name="nama_kontak" type="text" class="textboxlogin" id="nama_kontak">
			  <br/>
			  Email : <font color="red">*</font><br/>
			  <input name="email_kontak" type="text" class="textboxlogin" id="email_kontak">
			  <br/>  
			  Subjek : <font color="red">*</font><br/>
			  <input name="subjek_kontak" type="text" class="textboxlogin" id="subjek_kontak">
			  <br/>	
			  Pesan : <font color="red">*</font><br/>
			   <textarea name="pesan_kontak" class="textboxlogin2" id="pesan_kontak"></textarea> 
			   <br/>
			   <input name="kirim_kontak" type="submit" class="button" id="kirim_kontak" value="Kirim">	
				</form>            </td>
          </tr>
        </table>
		<?php	
			} else {
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td height="81" valign="middle" class="judul-admin">
				<img src="pic/block.png" width="30" align="left"> 
				&nbsp;Boneka Online | Jual Boneka Online | Toko Boneka Online 
				| Beli &nbsp;Boneka Online | Grosir Boneka 
			</td>
          </tr>
          <tr>
            <td><img src="pic/toko-boneka-lucu-murah-online.png" width="100%"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td><a href="?go=carapesan"><img src="pic/boneka-online-lucu-murah-pesan.png" width="100%" border="0"></a></td>
                  <td><a href="?go=katalog"><img src="pic/boneka-murah-lucu-online.png" width="100%" border="0"></a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="62" class="judul-admin"><img src="pic/block.png" width="30" align="absmiddle"> <span class="judul-admin2">Katalog Boneka </span></td>
          </tr>
          <tr>
            <td height="824" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">
				<a href="?go=katalog" class="text-bq">Lihat  lainnya </a> 
				<a href="?go=katalog"><img src="pic/icon/Free-web-icons/64x64/arrow-right.png" width="30" align="absmiddle"></a>
			</td>
          </tr>
        </table>
		<?php } ?>		
		</td>
        <td width="300" valign="top">
		<table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td><img src="pic/boneka-lucu-murah-online.png" width="315" height="291"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="list-name"><img src="icon/pdc/16x16/comment.png" width="16" height="16" /> My ShoutBox &Omega; </td>
                </tr>
                <tr>
                  <td align="center"><iframe width="100%" height="300" scrolling="Yes" align="middle" src="inbox_tamu.php"></iframe></td>
                </tr>
                <tr>
                  <td class="list-name">&copy;
                      <?=$year?></td>
                </tr>
            </table>
		</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><img src="pic/bank.png" width="338" height="422"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><hr noshade="noshade"/>
                <img src="pic/waktu-pengiriman.png" width="300" height="500"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
		</td>
      </tr>
      <tr>
        <td height="30" colspan="2" valign="top" bgcolor="#0093D9" id="footer">
			© 2014 RumahBoneka.com All rights reserved.
			<br/>
			by : rangga@dev.id		
		</td>
      </tr>
    </table>
	</div>
	
	<div id="keranjangBelanja">
		<div 
			style="padding: 3px 9px 10px 2px; 
				   font-family:Verdana, Arial, Helvetica, sans-serif; 
				   font-size:14px;
				   color: #333333;
				   text-align:right;">
			<?php
				$getCart = mysql_query('select sum(jumlah) as jumlah from pesan_temp where id_user = "'.$_SESSION['id'].'" ') or die(''.mysql_error());
				$arrCart = mysql_fetch_array($getCart);
				echo "<img src=pic/icon/pdc/32x32/basket.png align=absbottom width=25> &nbsp;";
				if ($arrCart['jumlah'] == 0) {
					echo "0 Items";
				} else {
					echo "<a href=?go=mycart class=text-bq>$arrCart[jumlah] Items</a>";
				}
				echo "&nbsp;&nbsp; | &nbsp;&nbsp;";
				if ($_SESSION['id']) {
					echo "<a href=?go=payment_confirm class=text-bq>Order List</a>";
					echo "&nbsp;&nbsp; | &nbsp;&nbsp;";
				}
			?>
			<?php if (!$_SESSION['id']) { echo "$_SESSION[id_user]"; ?>
				<a href="?go=register" class="text-bq">Register</a>
			<?php } else { ?>
				<img src="pic/icon/pdc/16x16/my-account.png"> <a href="#" class="text-bq"><?php echo $_SESSION[nama]; ?></a>
			<?php } ?>	
			&nbsp;&nbsp; | &nbsp;&nbsp;
			<?php if (!$_SESSION['id']) { echo "$_SESSION[id_user]"; ?>
				<a href="?go=signin" class="text-bq">Sign In</a>
			<?php }else{ ?>
				<a href="session_logout.php?send_id=<?=$_SESSION['id'] ?>" class="text-bq">Sign Out</a>
			<?php } ?>		
			&nbsp;&nbsp;&nbsp;&nbsp;		
		</div>
	</div>
	<form id="form1" name="form1" method="post" action="">
      <table width="367" border="0" cellpadding="0" cellspacing="0" id="body_right">
        <tr>
          <td colspan="2" valign="middle" bgcolor="#CCCCCC" style="border:1px solid #999999;-moz-border-radius:10px 0 0 10px;"><span class="textsedangatas"><img src="pic/icon/pdc/32x32/address.png" width="32" height="32" align="absmiddle" />Guest Book </span></td>
        </tr>
        <tr>
          <td width="206" valign="top">&nbsp;</td>
          <td width="161"><table width="161" border="0" align="right" cellpadding="0" cellspacing="5" bgcolor="#CCCCCC" id="b-shoutbox" >
              <tr>
                <td width="50" valign="top" class="detail-seleksi">Nama</td>
                <td width="150"><input name="nama" type="text" id="nama" size="18" /></td>
              </tr>
              <tr>
                <td valign="top" class="detail-seleksi">Email</td>
                <td><input name="email" type="text" id="email" size="18" /></td>
              </tr>
              <tr>
                <td valign="top" class="detail-seleksi">Pesan</td>
                <td><textarea name="pesan" cols="14" id="pesan"></textarea></td>
              </tr>
              <tr>
                <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style=" -moz-border-radius:8px;">
                    <tr>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0101.gif" width="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0101.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0106.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0106.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01011.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01011.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01016.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01016.gif" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0102.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0102.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0107.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0107.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01012.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01012.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01017.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01017.gif" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0103.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0103.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0108.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0108.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01013.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01013.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01018.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01018.gif" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0104.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0104.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0109.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0109.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01014.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01014.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01019.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01019.gif" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><img src="emo/AddEmoticons0105.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons0105.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01010.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01010.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01015.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01015.gif" /></td>
                      <td align="center" valign="top"><img src="emo/AddEmoticons01020.gif" width="35" height="35" />
                          <input name="dd" type="checkbox" id="dd" value="AddEmoticons01020.gif" /></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2" valign="top"><input name="bbkk" type="submit" id="bbkk" value="+ Submit" />
                    <input type="reset" name="Submit2" value="O Reset" /></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </form>
	</body>
</html>
<?php
	//save register id
	if (isset($_POST["register"])){
		$combine = $_POST['tanggal'] ."-". $_POST['bulan'] ."-". $_POST['tahun'];
		$saveReg = mysql_query('insert into user values(
				"NULL",
				"'.$_POST['txtNamaDepan'].'",
				"'.$_POST['txtNamaBelakang'].'",
				"'.$_POST['email'].'",
				"'.md5($_POST['password']).'",
				"'.$_POST['konfPass'].'",
				"'.$combine.'",
				"'.$_POST['konfPass'].'",
				"'.$_POST['isValid'].'",
				"'.$_POST['txtAlamat'].'",
				"'.$_POST['txtTelepon'].'"
				) ');
		if ($saveReg) {
			echo "<script>location='?go=signin'</script>>";
		} else {
			echo "<script>alert('gagal')</script>>";
		}
	
	//save send kontak kami	
	} else if (isset($_POST["kirim_kontak"])) {
		$saveKontak = mysql_query('insert into kontak_kami values(
				"NULL",
				"'.$_POST['nama_kontak'].'",
				"'.$_POST['email_kontak'].'",
				"'.$_POST['subjek_kontak'].'",
				"'.$_POST['pesan_kontak'].'",
				NOW()
				) ');
		if ($saveKontak) {
			echo "<script>location='?go=kontakkami'</script>>";
		} else {
			echo "<script>alert('gagal')</script>>";
		}
	} else if (isset($_POST["btnKonfirm"])) {
		$file = $_FILES["file"];
		$fname = $file["name"];
		$ftmp = $file["tmp_name"];
		$saveKonf = mysql_query('insert into konfirmasi values(
				"NULL",
				"'.$_POST['hdnIdPesan'].'",
				"'.$_POST['hdnNama'].'",
				"'.$_POST['txtBank'].'",
				"'.$_POST['txtRekening'].'",
				"'.$fname.'"
				) ');
				
		$updateStatusPesan = mysql_query('update pesan set status_pesan = "LUNAS" where id_pesan = "'.$_POST['hdnIdPesan'].'" ');
		
		$move = move_uploaded_file($ftmp,"file/$fname");
		if ($saveKonf && $updateStatusPesan) {
			echo "<script>location='?go=payment_confirm'</script>>";
		} else {
			echo "<script>alert('gagal')</script>>";
		}
	} else if(isset($_POST["bbkk"])){
		$time=date("d/M/Y, h:i:s");
		$b=mysql_query('insert into buku_tamu values("NULL","'.$_POST['nama'].'","'.$_POST['email'].'","'.$_POST['pesan'].'","'.$_POST['dd'].'","'.$time.'") ');
	}
?>
