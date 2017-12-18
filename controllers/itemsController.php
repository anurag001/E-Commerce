<?php

include_once('dbcon.php');

class itemsController 
{
	public function itemsList()
	{
		global $pdo;
		$query = $pdo->prepare("select * from items");
		if($query->execute())
		{
			while($row = $query->fetch(PDO::FETCH_OBJ))
			{
				echo'<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" id="item'.$row->itemId.'">
						<div class="card" style="width: 100%;">
							<img class="card-img-top" src="./images/'.$row->itemId.'.jpg" alt="Card image cap">
							<div class="card-block">
								<div class="card-body">
									<h4 class="card-title">'.$row->itemName.'</h4>
									<small class="card-text"><b>Rs. '.$row->itemPrice.'</b> | <b>'.$row->itemSize.'</b> | '.$row->itemDescription.'</small>
									<p class="card-text" id="item-response-'.$row->itemId.'"></p>
									<button onclick="addToCart('.$row->itemId.')" id="addToCartBtn'.$row->itemId.'" class="btn btn-primary">Add to Cart</button>
								</div>
							</div>
						</div>
					</div>';
			}
		}
	}
   
}

$itemsObject = new itemsController();
