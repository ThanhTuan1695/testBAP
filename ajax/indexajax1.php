<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>chay thu ajax trong php</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
			function loadajax() {
				
				$.ajax({
					url : "resultajax1.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         number:$('#number').val(),
                    },
                    success : function (result){
                        $('#result').html(result);
                    }
				});

			}
	</script>
</head>
<body>
	<div id="result"> 
		 this is content to ajax show 
	</div>
	<br/>
    <input type="text" value="" id="number"/>
	<input type="button" name="clickme" id="clickme" onclick="loadajax()" value="click me now!!!" />
</body>
</html>