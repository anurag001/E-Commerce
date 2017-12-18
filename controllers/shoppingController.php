<?php

include_once('dbcon.php');

class shoppingController 
{
	public function addToCart($itemId,$userId)
	{
		global $pdo;
		$since = date("Y-m-d");
		$insertQuery = $pdo->prepare("insert into cart(itemId,userId,createdOn) values(?,?,?)");
		$insertQuery->bindParam(1, $itemId);
		$insertQuery->bindParam(2, $userId);
		$insertQuery->bindParam(3, $since);
		if($insertQuery->execute())
		{
			$msg ='<span style="color:green;"><b>Added</b></span>';
		}
		echo $msg;
	}

	public function cartList($userId)
	{
		global $pdo;
		$since = date("Y-m-d");
		$query = $pdo->prepare("select cart.cartId,cart.itemId,items.itemName,items.itemPrice,items.itemSize,items.itemDescription from cart left outer join items on items.itemId = cart.itemId where cart.userId = ?");
		$query->bindParam(1, $userId);
		if($query->execute())
		{
			while($row = $query->fetch(PDO::FETCH_OBJ))
			{
				echo'<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" id="cart'.$row->cartId.'">
						<div class="card" style="width: 100%;">
							<img class="card-img-top" src="./images/'.$row->itemId.'.jpg" alt="Card image cap">
							<div class="card-block">
								<div class="card-body">
									<h4 class="card-title">'.$row->itemName.'</h4>
									<small class="card-text">Rs. <span class="item-price">'.$row->itemPrice.'</span> | '.$row->itemSize.' | '.$row->itemDescription.'</small>
									<p class="card-text" id="item-response-'.$row->cartId.'"></p>
									<button class="btn btn-primary">Assured</button>
									<button onclick="removeFromCart('.$row->cartId.')" class="btn btn-warning">Remove</button>
								</div>
							</div>
						</div>
					</div>';
			}

		}
	}

	public function removeFromCart($cartId,$userId)
	{
		global $pdo;
		$query = $pdo->prepare("delete from cart where cartId=? and userId=?");
		$query->bindParam(1,$cartId);
		$query->bindParam(2,$userId);
		$query->execute();
	}

	public function checkout($userId,$address)
	{
		global $pdo;
		$query = $pdo->prepare("update users set address=? where id=?");
		$query->bindParam(1,$address);
		$query->bindParam(2,$userId);
		if($query->execute())
		{
			echo '<script>window.location.href = "../checkout.php";</script>';
		}
	}
   
}

$shoppingObject = new shoppingController();
