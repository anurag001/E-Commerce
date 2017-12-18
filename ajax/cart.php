<?php

	include_once("../controllers/shoppingController.php");
	session_start();
	if(!empty($_SESSION["userId"]))
	{
		$userId = $_SESSION["userId"];
		$shoppingObject->cartList($userId);
	}
	else
	{
		echo '<script>window.location.href = "./login.php";</script>';
	}

?>