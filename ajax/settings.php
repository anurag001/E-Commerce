<?php

	include_once("../controllers/accountController.php");
	session_start();
	if(!empty($_SESSION["userId"]))
	{
		if(!empty($_POST["current-password"]) && !empty($_POST["new-password"]) && !empty($_POST["confirm-new-password"]))
		{
			$userId = $_SESSION["userId"];
			$currentPassword = $_POST["current-password"];
			$newPassword = $_POST["new-password"];
			$confirmNewPassword = $_POST["confirm-new-password"];

			if(preg_match('/^[a-zA-Z0-9]*$/',$newPassword))
			{
				$accountObject->changePassword($userId,$currentPassword,$newPassword,$confirmNewPassword);
			}
			else
			{
				echo '<span style="color:red;"><b>Password should be alphanumeric only</b></span>';
			}

		}
		else
		{
			echo '<span style="color:red;"><b>Provide all fields clearly</b></span>';
		}
	}
	else
	{
		echo '<script>window.location.href = "../login.php";</script>';
	}

?>