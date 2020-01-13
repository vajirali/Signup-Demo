<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data" id="profileImageForm">
			<?php for($i = 0; $i < 5; $i++){ ?>
				<input type="file" name="profile[]"><br/><br/>
			<?php } ?>
			<button type="submit" value="1" name="btn_submit">Submit</button>
		</form>
	</body>
</html>
<script>
$(document).ready(function (){
	$("#profileImageForm").validate({
		ignore: [],
		  rules: {
			'category[]': {
			  required: true
			}
		  }
		submitHandler: function(form) {
		   form.submit();
		}
	});
});
</script>
