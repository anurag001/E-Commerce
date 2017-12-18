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
								<h3>Login</h3>
							</div>
							<div class="card-body">
								<form id="login-form" method="post">
									<div class="form-group">
										<label for="email">Email address</label>
										<input type="email" class="form-control" name="email" placeholder="Email id" required="required">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" name="password" placeholder="Password" required="required">
									</div>
									<button type="submit" class="btn btn-primary" id="login-btn">Login</button>
									<br><br>
									<div id="login-result"></div>
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
