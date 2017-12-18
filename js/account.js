$("#register-form").on("submit",function(event){
	event.preventDefault();
	var url = "./ajax/register.php";
	$.ajax({
		type:"POST",
		url:url,
		data:$(this).serialize(),
		beforeSend:function()
		{
			$("#register-btn").html("Registering...");
			$("#register-btn").prop("disabled",true);
		},
		success: function(data){
			$("#register-result").html(data);
			setTimeout(function() {
				$("#register-result").html("");
			}, 7000);
		},
		error: function(response){
			$("#register-result").html(response);
			setTimeout(function() {
				$("#register-result").html("");
			}, 7000);
		},
		complete: function()
		{
			$("#register-btn").html("Register");
			$("#register-btn").prop("disabled",false);
		}
	});
});


$("#login-form").on("submit",function(event){
	event.preventDefault();
	var url = "./ajax/login.php";
	$.ajax({
		type:"POST",
		url:url,
		data:$(this).serialize(),
		beforeSend:function()
		{
			$("#login-btn").html("Logging...");
			$("#login-btn").prop("disabled",true);
		},
		success: function(data){
			$("#login-result").html(data);
			setTimeout(function() {
				$("#login-result").html("");
			}, 7000);
		},
		error: function(response){
			$("#login-result").html(response);
			setTimeout(function() {
				$("#login-result").html("");
			}, 7000);
		},
		complete: function()
		{
			$("#login-btn").html("Login");
			$("#login-btn").prop("disabled",false);
		}
	});
});


$("#settings-form").on("submit",function(event){
	event.preventDefault();
	var url = "./ajax/settings.php";
	$.ajax({
		type:"POST",
		url:url,
		data:$(this).serialize(),
		beforeSend:function()
		{
			$("#settings-btn").prop("disabled",true);
		},
		success: function(data){
			$("#settings-result").html(data);
			setTimeout(function() {
				$("#settings-result").html("");
			}, 7000);
		},
		error: function(response){
			$("#settings-result").html(response);
			setTimeout(function() {
				$("#settings-result").html("");
			}, 7000);
		},
		complete: function()
		{
			$("#settings-btn").prop("disabled",false);
		}
	});
});