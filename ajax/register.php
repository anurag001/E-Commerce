<?php

	include_once("../controllers/accountController.php");
	if(!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"]))
	{
		$email = htmlspecialchars($_POST["email"]);
		$name = htmlspecialchars($_POST["name"]);
		$password = htmlspecialchars($_POST["password"]);
		$accountObject->register($email,$name,$password);
	}
	else
	{
		echo '<span style="color:red;"><b>Provide all fields clearly</b></span>';
	}

?>