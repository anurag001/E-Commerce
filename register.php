<!DOCTYPE html>
<html lang="eng">
	<head>
<?php
		require_once("./assets/header.php");
?>
	</head>
	<body>
<?php
		require_once("./assets/navbar.php");
		if(!empty($_SESSION["userId"]))
		{
			echo '<script>window.location.href = "./index.php";</script>';
		}
?>
		<section style="margin-top: 60px;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
								<h3>Create Account</h3>
							</div>
							<div class="card-body">
								<form method="post" id="register-form">
									<div class="form-group">
										<label for="email">Email address</label>
										<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email id" required="required">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
									</div>
									<button type="submit" class="btn btn-primary" id="register-btn">Register</button>
									<br><br>
									<div id="register-result"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php
		require_once("./assets/footer.php");
?>	
	</body>
	<script type="text/javascript" src="./js/account.js"></script>
</html>
