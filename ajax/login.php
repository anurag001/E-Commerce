<?php

	include_once("../controllers/accountController.php");
	if(!empty($_POST["email"]) && !empty($_POST["password"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		$accountObject->login($email,$password);
	}
	else
	{
		echo '<span style="color:red;"><b>Provide all fields clearly</b></span>';
	}

?>