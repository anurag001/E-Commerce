<?php

	include_once("../controllers/shoppingController.php");
	session_start();
	if(!empty($_SESSION["userId"]))
	{
		$userId = $_SESSION["userId"];
		if(!empty($_POST["address"]))
		{
			$address = $_POST["address"];
			$shoppingObject->checkout($userId,$address);
		}
		else
		{
			echo '<script>alert("Please provide shipping address");</script>';
			echo '<script>window.location.href = "../cart.php";</script>';
		}
	}
	else
	{
		echo '<script>window.location.href = "../index.php";</script>';
	}

?>