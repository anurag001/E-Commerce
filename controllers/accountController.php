<?php

include_once('dbcon.php');

class accountController 
{

	public function register($email,$name,$password)
	{
		global $pdo;
		$email = trim(htmlspecialchars($email));
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
		
		if (preg_match($regex, $email))
		{
			$emailQuery=$pdo->prepare("select email from users where email = ?");
			$emailQuery->bindParam(1,$email);
			$emailQuery->execute();
			if($emailQuery->rowCount()>0)
			{
				 $msg ='<span style="color:red;"><b>Email id is already in use</b></span>';
			}
			else
			{
				if(preg_match('/(\s|[a-zA-Z])/im',$name))
				{
					$password = trim(htmlspecialchars($password));
					if(preg_match('/^[a-zA-Z0-9]*$/',$password))
					{

						$password = md5($password);
						$since = date("Y-m-d");
						$insertQuery = $pdo->prepare("insert into users
							(email,name,password,createdOn) values(?,?,?,?)");
						$insertQuery->bindParam(1, $email);
						$insertQuery->bindParam(2, $name);
						$insertQuery->bindParam(3, $password);
						$insertQuery->bindParam(4, $since);

						if($insertQuery->execute())
						{
							$msg ='<span style="color:green;"><b>User is registered successfully</b></span>';
						}
						
					}
					else
					{
						 $msg ='<span style="color:red;"><b>Password should be alphanumeric only</b></span>';
					}
						
				}
				else
				{
					$msg ='<span style="color:red;"><b>Name must contain letters</b></span>';
				}

			}
		}
		else
		{
			$msg ='<span style="color:red;"><b>Email format is invalid</b></span>';
		}
		
		echo $msg;

	}

	public function login($logemail,$logpass)
	{
		global $pdo;
		$logemail = trim(htmlspecialchars($logemail));
		$logpass = htmlspecialchars($logpass);
		$logemail = filter_var($logemail, FILTER_SANITIZE_EMAIL);
		$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
		
		if (preg_match($regex, $logemail))
		{
			$logpass = md5($logpass);
			$query = $pdo->prepare("select id from users where email=? and password=?");
			$query->bindParam(1,$logemail);
			$query->bindParam(2,$logpass);
			$query->execute();
			if($query->rowCount()>0)
			{
				$row = $query->fetch(PDO::FETCH_OBJ);
				session_start();
				$_SESSION["userId"] = $row->id;
				echo '<script>window.location.href = "./index.php";</script>';
				$msg = '<span style="color:green;"><b>Logging in....</b></span>';

			}
			else
			{
				$msg ='<span style="color:red;"><b>Invalid Credentials</b></span>';
			}
		}
		else
		{
			$msg ='<span style="color:red;"><b>Email format is invalid</b></span>';
		}

		echo $msg;
	}

	public function changePassword($userId,$currentPassword,$newPassword,$confirmNewPassword)
	{
		global $pdo;
		$query = $pdo->prepare("select * from users where id = ?");
		$query->bindParam(1,$userId);
		if($query->execute())
		{
			$row = $query->fetch(PDO::FETCH_OBJ);
			$password = $row->password;
			if($password == md5($currentPassword) && $newPassword == $confirmNewPassword)
			{
				$newPassword = md5($newPassword);
				$updateQuery = $pdo->prepare("update users set password=? where id = ?");
				$updateQuery->bindParam(1,$newPassword);
				$updateQuery->bindParam(2,$userId);
				if($updateQuery->execute())
				{
					$msg = '<span style="color:green;"><b>Password is changed successfully</b></span>';
				}
				else
				{
					$msg ='<span style="color:red;"><b>Error occurs while changing your password</b></span>';
				}
			}
			else
			{
				$msg ='<span style="color:red;"><b>Your Current password does not match</b></span>';
			}

		}
		echo $msg;
	}

   
}

$accountObject = new accountController();
