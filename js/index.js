function pullItemsList()
{
	var url = "./ajax/items.php";
	$.ajax({
		type:"POST",
		url:url,
		beforeSend:function()
		{
			$("#items-display").html('<div class="loader"></div>');
		},
		success: function(data){
			$("#items-display").html(data);
		},
		error: function(response){
			$("#items-display").html(response);
		},
		complete: function()
		{
		}
	});
}

function addToCart(itemId)
{
	var url = "./ajax/shopping.php";
	$.ajax({
		type:"POST",
		url:url,
		data:"itemId="+itemId,
		beforeSend: function()
		{
			$("#addToCartBtn"+itemId).prop("disabled",true);
		},
		success: function(data){
			$("#item-response-"+itemId).html(data);
			setTimeout(function() {
				$("#item-response-"+itemId).html("");
			}, 7000);
		},
		error: function(response){
			$("#item-response-"+itemId).html(response);
			setTimeout(function() {
				$("#item-response-"+itemId).html("");
			}, 7000);
		},
		complete: function()
		{
			$("#addToCartBtn"+itemId).prop("disabled",false);
		}
	});
}

window.onload = function(){
	pullItemsList();
};