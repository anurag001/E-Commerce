<?php
	session_start();
	$_SESSION["userId"]="";
	session_destroy();
	echo '<script>window.location.href = "./index.php";</script>';
	
?>
