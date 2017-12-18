function totalPrice()
{
	var cost = 0;
	var elements = document.getElementsByClassName('item-price');
	for(var i=0;i<elements.length;i++)
	{
		cost = cost + parseInt(elements[i].innerHTML);
	}
	var str = "Rs. "+cost;
	document.getElementById("totalCost").innerHTML=str;
	document.getElementById("amountPayable").innerHTML=str;
}

function pullCartList()
{
	var url = "./ajax/cart.php";
	$.ajax({
		type:"POST",
		url:url,
		beforeSend:function()
		{
			$("#cart-display").html('<div class="loader"></div>');
		},
		success: function(data){
			$("#cart-display").html(data);
		},
		error: function(response){
			$("#cart-display").html(response);
		},
		complete: function()
		{
			totalPrice();
		}
	});
}

function removeFromCart(cartId)
{
	if(confirm("Do you want to remove this item from your cart")==true)
	{
		var url = "./ajax/remove.php";
		$.ajax({
			type:"POST",
			url:url,
			data:"cartId="+cartId,
			success: function(response){
				document.getElementById("cart"+cartId).remove();
			},
			error: function(response){
				alert(response);
			},
			complete: function()
			{
				totalPrice();
			}
		});
	}
	
}


window.onload = function(){
	pullCartList();
};