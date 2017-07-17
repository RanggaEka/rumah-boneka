<?php
	require_once("config.php");
	$user	= $_POST['username_post'];
	$pass	= $_POST['password_post'];
	$ps		= md5($pass);

	$login=mysql_query("select * from user where email = '$user' and password = '$ps'");
	$data=mysql_fetch_array($login);
	
	$nama		= $data['nama_depan'] ." ". $data['nama_belakang'];;
	$email		= $data['email'];
	$id			= $data['id_user'];
	$password	= $data['password'];
	
	if($user==$email and $ps==$password) {
		session_start();
		session_register('ecommerce');
		$_SESSION[nama]	= $nama;
		$_SESSION[email]	= $email;
		$_SESSION[id]		= $id;
		$_SESSION[password]	= $password;
		?>
		<script>
		location="index.php";
		</script>
		<?
	} else {
?>
	<script>
	location="index.php";
	alert('fail login');
	</script>
<? } ?>
