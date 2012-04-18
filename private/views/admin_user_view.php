<?php
if($this->this_user) {
	$id = $this->this_user->get_id();
	$email = $this->this_user->get_email();
	$password = $this->this_user->get_password();
	$first_name = $this->this_user->get_first_name();
	$last_name = $this->this_user->get_last_name();
	$last_login = $this->this_user->get_last_login();
	$time_create = $this->this_user->get_time_create();
	$time_update = $this->this_user->get_time_update();
	$status = $this->this_user->get_status();
	$bio = $this->this_user->get_bio();
	$type = $this->this_user->get_type();
}
?>

<h1 class="title">Edit User</h1>

<form name="user_form" id="user_form">
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

	<h3>Email</h3>
	<input type="text" id="email" name="email" value="<?php echo $email;?>" /><br />

	<h3>First Name</h3>
	<input type="text" id="first_name" name="first_name" value="<?php echo $first_name;?>" /><br />

	<h3>Last Name</h3>
	<input type="text" id="last_name" name="last_name" value="<?php echo $last_name;?>" /><br />
	
	<h3>Bio</h3>
	<textarea id="bio" name="bio" style="width:350px;height:160px"><?php echo $bio;?></textarea><br />

	<h3>Status</h3>
	<select name="status" id="status">
		<option value="a"<?php if($status == 'a'): echo ' selected="selected" '; endif;?>>Active</option>
		<option value="d"<?php if($status == 'd'): echo ' selected="selected" '; endif;?>>Deleted</option>
		<option value="p"<?php if($status == 'p'): echo ' selected="selected" '; endif;?>>Disabled</option>
	</select>
	<br />
	
	<h3>Type</h3>
	<select name="type" id="type">
		<option value="0"<?php if($type == 0): echo ' selected="selected" '; endif;?>>User</option>
        <option value="1"<?php if($type == 1): echo ' selected="selected" '; endif;?>>Author</option>		
        <option value="5"<?php if($type == 5): echo ' selected="selected" '; endif;?>>Contributer</option>
		<option value="7"<?php if($type >= 7): echo ' selected="selected" '; endif;?>>Admin</option>
	</select>
	<br />
	

	<?php if($id == 0 || isset($_GET['reset'])): ?>
		<h3>Password</h3>
		<input type="text" id="password" name="password" value="" /><br />
		
		<?php if(isset($_GET['reset'])): ?>
			<br><a href="?" class="btn danger">Cancel Password Reset</a>
		<?php endif; ?>
	<?php else: ?>
		<br><a href="?reset" class="btn">Reset Password</a>
	<?php endif; ?>
	
</form>


<div class="actions">
	<div class="action_buttons">
		<a href="/admin/users" class="btn">Back</a>
		<button type="button" id="submit_user_button" name="submit_user_button" class="btn primary">Save User</button>
	</div>
</div>