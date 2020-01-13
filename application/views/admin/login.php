<html>
	<head>
		<title>Admin Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
	</head>
	<body>
		
		<form method="post" id="loginform">
			<table border="1" align="center" action="">
				<tr><th>Login</th></tr>
				<?php
					if($this->session->flashdata('error')){
						echo '<tr><td>'.$this->session->flashdata('error').'</td></tr>';
					}
				?>
				<tr><td><input type="text" name="email" placeholder="Email"></td></tr>
				<tr><td><input type="password" name="password" placeholder="Password"></td></tr>
				<tr><th><button type="submit" name="btn_submit" value="1">Submit</button></th></tr>
			</table>
		</form>		
	</body>
</html>
<script>
$(document).ready(function (){
	$("#loginform").validate({
		rules:{
			password:"required",
			email: {
				required: true,       
				email: true
			},
		},
		messages:{
			email:"please enter valid email",
			password:"please enter password",
		},
		submitHandler: function(form) {
		    /* var data = new FormData(form);
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url(); ?>admin/login/index",
				data: data,
				processData: false,
				contentType: false,
				success: function (data) {
				}
			});
			return false; */
			form.submit();
		}
	});
});
</script>