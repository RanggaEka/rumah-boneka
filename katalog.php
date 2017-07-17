<html>
	<head>
		<link href="style/core.css" rel="stylesheet" type="text/css" />
		<link href="style/core_profil.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/showContentController.js"></script>
		<script>
		function validQty(txtbel, qty) {
			var txtBeli = document.getElementById(txtbel).value;
			var clear = function() {
				document.getElementById(txtbel).value = "";
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
		
		function processOrder(sessionID,kodeBrg) {
			if (sessionID == null || sessionID == "") {
				document.getElementById('divSlide').innerHTML = "Anda harus <a class=text-bq href=\"?go=signin\">login</a> untuk melakukan transaksi";
				document.getElementById('divSlide').style.visibility = "visible";
				setTimeout(function(){
					document.getElementById("divSlide").style.opacity = 1;
				},500);
			} else {
				document.formKatalog.action = "process.php?request_kode="+kodeBrg;
				document.formKatalog.submit();
			}
		}
		</script>
		<style>
			.beliButton {
				border:1px #0066FF solid;
				width:50px;
				height:25px;
				background:#0093D9;
				text-align:center;
				padding-top:10px;
				border-radius:3px;
			}
		</style>
	</head>
	<body onLoad="countdown_init()">
		<div id="countdown_text" align="center"></div>
		<div id="myImg">
			<form id="formKatalog" name="formKatalog" method="post" action="">
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr>
					<td width="3%" align="right" valign="middle" class="text-title"><img src="pic/icon/pdc/32x32/zoom.png" width="32" height="32"></td>
					<td width="97%" class="text-title">Cari Boneka 
						<select name="kategori" class="textboxlogin" id="kategori">
							<option selected="selected" value="All Item">All Item </option>
							<option value="hewan">Seri Hewan</option>
							<option value="figure">Seri Action Figure</option>
							<option value="love">Seri Love</option>
						</select> 
					<input name="Submit" type="submit" class="button" value="cari"  style="height:25px; width:50px;"/>
					<?php echo "<span class=text-title>seri : $_POST[kategori]</span>"; ?>
					</td>
					</tr>
				</table>
				
				<table width="100%" border="0" cellspacing="1" cellpadding="2">
				<?php 
					require_once("config.php");
					if ($_POST['kategori'] == "hewan" || $_POST['kategori'] == "figure" || $_POST['kategori'] == "love") {
						$getKat = mysql_query("select * from katalog where kategori = '".$_POST['kategori']."' ");
					} else {
						$getKat = mysql_query("select * from katalog");
					}
					while($getKatArr=mysql_fetch_array($getKat)) {
				?>
				<tr>
					<td colspan="2" valign="top" bgcolor="#FFFF99" class="text"><?=$getKatArr['kode_barang'];?>
					-
					<?=$getKatArr['nama_barang'];?>
					</td>
				</tr>
				<tr>
					<td width="8%" valign="top"><img src="<?=$getKatArr['file'];?>" width="140px" /></td>
					<td width="92%" valign="top"><span class="textsedangabukecil"> Harga Satuan : IDR Rp.
					<?=$getKatArr['harga'];?>
					,- <br/>
					Stok :
					<?=$getKatArr['stok'];?>
					pieces <br/>
					Deskripsi :
					<?=$getKatArr['deskripsi'];?>
					<br/>
					<br/>
					<div class="beliButton">
						<a href="#" onClick="processOrder('<?=$_SESSION['id']?>','<?=$getKatArr['kode_barang'];?>')"
						style="text-decoration:none; color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif">
							Beli
						</a>
					</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" valign="top">&nbsp;</td>
				</tr>
				<?php } ?>
				</table>
		  </form>
		</div>
	</body>
</html>
