<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
</head>
<body>
<h1>Create an Account</h1>
<?php echo form_open('http://giantfist.com/asl/admin'); ?>

<p>
<?php echo form_label('Email Address: ', 'email_address'); ?>
<?php echo form_input('email_address2', set_value('email_address2'), 'id="email_address"'); ?>
</p>

<p>
<?php echo form_label('First Name: ', 'first_name'); ?>
<?php echo form_input('first_name', set_value('first_name'), 'id="first_name"'); ?>
</p>

<p>
<?php echo form_label('Last Name: ', 'last_name'); ?>
<?php echo form_input('last_name', set_value('last_name'), 'id="last_name"'); ?>
</p>

<p>
<?php echo form_label('Password: ', 'password'); ?>
<?php echo form_password('password', '', 'id="password"'); ?>
</p>

<p>
<?php echo form_label('Confirm Password: ', 'confirm_password'); ?>
<?php echo form_password('confirm_password', '', 'id="confirm_password"'); ?>
</p>

<p>
<?php echo form_submit('register', 'Create Account!'); ?>
</p>

<?php form_close(); ?>

<div class="errors"><?php echo validation_errors(); ?></div>

</body>
</html>