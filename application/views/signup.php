<html>
	<head>
		<title><?php echo $title; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
	</head>
	<body>
	<?php 
		if(isset($id)){
			$id = $id;
		}else{
			$id = '';
		}
	?>
		<form method="post" id="signupform" enctype="multipart/form-data">
			<table border="1" cellspacing="0">
				<tr>
					<th colspan="2"><?php echo $id != '' ? 'Update':'Add';?> Detail</th>
				</tr>
				<?php if($this->session->flashdata('error')){ ?>
				<tr>
					<th colspan="2"><?php echo $this->session->flashdata('error'); ?></th>
				</tr>
				<?php } ?>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="fname" value="<?php if(isset($fname)){ echo $fname; } ?>"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="lname" value="<?php if(isset($lname)){ echo $lname; } ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php if(isset($email)){ echo $email; } ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cpassword"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="male">Male &nbsp;
						<input type="radio" name="gender" value="female">FeMale
					</td>
					<?php if(isset($gender)) { ?>
						<script>
							$("input[name=gender][value=<?php echo $gender; ?>]").attr('checked',true);
						</script>
					<?php } ?>
				</tr>
				<tr>
					<td>Hobby</td>
					<td>
						<input type="checkbox" name="hobby[]" value="sports" id="ch_sports">Sports &nbsp;
						<input type="checkbox" name="hobby[]" value="swimming" id="ch_swimming">Swimming &nbsp;
						<input type="checkbox" name="hobby[]" value="scating" id="ch_scating">Scating &nbsp;
						<input type="checkbox" name="hobby[]" value="music" id="ch_music">Music
					</td>
					<?php if(isset($hobby)) { 
						$hobbies = explode(",",$hobby);
						foreach($hobbies as $hobby){ ?>
							<script>
							  $("#ch_<?php echo $hobby;?>").attr('checked', true);
							</script>
					<?php }} ?>
				</tr>
				<tr>
					<td>Image</td>
					<td>
						<input type="file" name="profile">
						<?php if(isset($profile)) { ?>
							<img src="<?php echo base_url().'uploads/'.$profile?>" height="80" width="80">
							<input type="hidden" name="profile" value="<?php echo $profile;?>">
						<?php } ?>
					</td>
					
				</tr>
				<tr>
					<th colspan="2"><button type="submit" name="btn_submit" value="1"><?php echo $id != '' ? 'Update':'Submit';?></button>&nbsp;&nbsp;
					<a href="<?php echo base_url().'signup/viewall';?>"><button type="button">Cancel</button></a>
					</th>
				</tr>
			</table>
		</form>
	</body>
</html>
<script>
$(document).ready(function (){
	$("#signupform").validate({
		rules:{
			fname:"required",
			lname:"required",
			email: {
				required: true,       
				email: true
			},
			<?php if($id == ''){ ?>
			password: "required",			
			profile: "required",			
			<?php } ?>
			cpassword: {
			  equalTo: "#password"
			},
			gender:"required",
			'hobby[]':"required"
		},
		messages:{
			
		},
		submitHandler: function(form) {
		    /* var data = new FormData(form);
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url(); ?>signup/add/<?php echo $id; ?>",
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