<?php

	include_once("../controllers/shoppingController.php");
	session_start();
	if(!empty($_SESSION["userId"]) && !empty($_POST["cartId"]))
	{
		$cartId = $_POST["cartId"];
		$userId = $_SESSION["userId"];
		$shoppingObject->removeFromCart($cartId,$userId);
	}
	else
	{
		echo '<script>window.location.href = "../login.php";</script>';
	}

?>