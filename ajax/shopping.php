<?php

	include_once("../controllers/shoppingController.php");
	session_start();
	if(!empty($_SESSION["userId"]) && !empty($_POST["itemId"]))
	{
		$itemId = $_POST["itemId"];
		$userId = $_SESSION["userId"];
		$shoppingObject->addToCart($itemId,$userId);
	}
	else
	{
		echo '<script>window.location.href = "./login.php";</script>';
	}

?>