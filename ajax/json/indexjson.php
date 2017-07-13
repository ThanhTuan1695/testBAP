<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>chay thu ajax trong php</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#search-box").keyup(function(){
					$.ajax({
					type: "POST",
					url: "readcity.php",
					data:'keyword='+$(this).val(),
					beforeSend: function(){
					},
					success: function(data){
						$("#suggesstion").show();
						$("#suggesstion").html(data);
						$("#search-box").css("background","#FFF");
					}
					});
				});
			});
			
			function selectCity(val) {
			$("#search-box").val(val);
			$("#suggesstion").hide();
			}
			
			// $("#search-box").change(function () {
			// $("#country-list li").click(function () {
			// var text = $(this).text();
			// $("#search-box").val(text);
			// $("#showdata").hide();
			// });
			// }) 
	</script>
</head>
<body>
	<div class="search">
	<input type="text" id="search-box" placeholder="city Name" />
	<div id="suggesstion" ></div>
</div>
</body>
</html>