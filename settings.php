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
		if(empty($_SESSION["userId"]))
		{
			echo '<script>window.location.href = "./login.php";</script>';
		}
?>
		<section style="margin-top: 60px;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
								<h3>Change Password - Account Settings</h3>
							</div>
							<div class="card-body">
								<form id="settings-form" method="post">
									<div class="form-group">
										<label for="current-password">Current Password</label>
										<input type="password" class="form-control" name="current-password" placeholder="Current Password" required="required">
									</div>
									<div class="form-group">
										<label for="new-password">New Password</label>
										<input type="password" class="form-control" name="new-password" placeholder="New Password" required="required">
									</div>
									<div class="form-group">
										<label for="confirm-new-password">Confirm New Password</label>
										<input type="password" class="form-control" name="confirm-new-password" placeholder="Confirm New Password" required="required">
									</div>
									<button type="submit" class="btn btn-primary" id="settings-btn">Change Password</button>
									<br><br>
									<div id="settings-result"></div>
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
