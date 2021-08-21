$(document).ready(function() {

	$("#email").keyup(function () {
		var em = $(this).val();
		const url = $("#base_url").val();
		// $("#msgEmail").html(em);
		$.post(url+"/register/check_email",{email:em},function(data){
			$("#msgEmail").html(JSON.parse(data));
		});
	})
});