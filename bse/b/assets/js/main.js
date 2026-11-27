$(window).ready(function(){
	$(".bi-eye-slash").click(function(){
		if ($("#pwd").attr("type") == "password") {
			$("#pwd").attr("type","text");
		}else{
			$("#pwd").attr("type","password");
		}
	})
})