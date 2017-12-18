<?php
	session_start();
	if(!empty($_SESSION["userId"]))
	{
		$userId = $_SESSION["userId"];
	}
?>
<nav class="navbar fixed-top navbar-dark bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-auto mr-auto">
				<a class="navbar-brand" href="./index.php">
					<h2 class="banner">E-Commerce</h2>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
<?php
			if(!empty($_SESSION["userId"]))
			{
				echo '<a class="btn btn-outline-light glow" href="./settings.php">Settings</a>
				<a class="btn btn-outline-light glow" href="./cart.php">My Cart</a>
				<a class="btn btn-outline-light glow" href="./logout.php">Logout</a>';
			}
			else
			{
				echo '<a class="btn btn-outline-light glow" href="./login.php">Login</a>
				<a class="btn btn-outline-light glow" href="./register.php">Register</a>';
			}
?>
			</div>
		</div>
	</div>
</nav>
<br>
<br>