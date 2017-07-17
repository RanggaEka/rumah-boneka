<?php
	require_once("config.php");
	if ($_REQUEST['send_id'] != "" || $_REQUEST['send_id'] != null) {
		$deleteSessionOrderTmp = mysql_query('delete from pesan_temp where id_user = "'.$_REQUEST['send_id'].'" ') or die (''.mysql_error());
			if ($deleteSessionOrderTmp) {
				session_start();
				session_unset();
				session_unregister('ecommerce');
				session_destroy();
				ob_start();
				header("location:index.php");
			}
	}
?>
