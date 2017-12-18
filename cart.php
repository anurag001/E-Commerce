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
?>
		<section style="margin-top: 60px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
    					<h4 class="display-4">My Cart</h4>
					</div>
					<div class="col-lg-3">
						<h4>Order Total</h4><h4 id="totalCost"></h4>
					</div>
					<div class="col-lg-3">
						<a href="./index.php" class="btn btn-warning btn-block">Back To Shopping</a>
						<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">Check Out</a>
					</div>
				</div>
				<hr>
				<div class="row" id="cart-display">

				</div>
			</div>
		</section>

		<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modalLabel">Checkout Display</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<table class="table">
							<tr>
								<td>Amount Payable</td>
								<td><p id="amountPayable"></p></td>
							</tr>
							<tr>
								<td>Shipping Charge</td>
								<td>Free</td>
							</tr>
						</table>
						<form method="post" id="checkout-form" action="./ajax/shipping.php">
							<div class="form-group">
								<textarea class="form-control" name="address" placeholder="Provide your Complete Address" required="required"></textarea>
							</div>
							<button type="submit" class="btn btn-primary" id="checkout-btn">Proceed</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
<?php
		require_once("./assets/footer.php");
?>	
	</body>
	<script type="text/javascript" src="./js/cart.js"></script>
</html>
