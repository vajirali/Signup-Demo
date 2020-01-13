<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<h2><a href="<?php echo base_url().'signup/add/';?>">Add new</a></h2>
		<table border="1" cellspacing="0">
			<tr>
				<th colspan="9">All Records</th>
			</tr>
			<?php if($this->session->flashdata('success')){ ?>
			<tr>
				<th colspan="9"><?php echo $this->session->flashdata('success'); ?></th>
			</tr>
			<?php } ?>
			<tr>
				<th>Fname</th>
				<th>Lname</th>
				<th>Email</th>
				<th>Password</th>
				<th>Gender</th>
				<th>Hobby</th>
				<th>Profile</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php 
			if(count($result) > 0){
			foreach($result as $detail){ ?>
			<tr>				
				<td><?php echo $detail['fname']; ?></td>
				<td><?php echo $detail['lname']; ?></td>
				<td><?php echo $detail['email']; ?></td>
				<td><?php echo $detail['password']; ?></td>
				<td><?php echo $detail['gender']; ?></td>
				<td><?php echo $detail['hobby']; ?></td>
				<td><img src="<?php echo base_url().'uploads/'.$detail['profile']; ?>" height="80" width="80"></td>
				<td><a href="<?php echo base_url().'signup/add/'.$detail['id'];?>">Edit</a></td>
				<td><a href="<?php echo base_url().'signup/delete/'.$detail['id'];?>" onclick="return confirm('Are you sure for delete?')">Delete</a></td>
			</tr>
			<?php }}else{ ?>
			<tr>
				<th colspan="9">No Records Found.</th>
			</tr>
			<?php } ?>
		</table>
		
	</body>
</html>