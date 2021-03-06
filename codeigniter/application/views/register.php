<section id="register" class="one-half column">

	<h2>Create an Account</h2>

	<?php echo form_open(base_url().'admin'); ?>
	<p>
	<?php echo form_label('Email Address: ', 'email_address'); ?>
	<?php echo form_error('email_address2'); ?>
	<?php echo form_input('email_address2', set_value('email_address2'), 'id="email_address" class="u-full-width"'); ?>
	</p>

<div class="row">
	<div class="one-half column">
	<?php echo form_label('First Name: ', 'first_name'); ?>
	<?php echo form_error('first_name'); ?>
	<?php echo form_input('first_name', set_value('first_name'), 'id="first_name" class="u-full-width"'); ?>
	</div>
	<div class="one-half column">
	<?php echo form_label('Last Name: ', 'last_name'); ?>
	<?php echo form_error('last_name'); ?>
	<?php echo form_input('last_name', set_value('last_name'), 'id="last_name" class="u-full-width"'); ?>
	</div>
</div>

<div class="row">
	<div class="one-half column">
	<?php echo form_label('Password: ', 'password'); ?>
	<?php echo form_error('password2'); ?>
	<?php echo form_password('password2', '', 'id="password" class="u-full-width"'); ?>
	</div>

	<div class="one-half column">
	<?php echo form_label('Confirm Password: ', 'confirm_password'); ?>
	<?php echo form_error('confirm_password'); ?>
	<?php echo form_password('confirm_password', '', 'id="confirm_password" class="u-full-width"'); ?>
	</div>
</div>

	<p>
	<?php echo form_submit('register', 'Create Account!', 'class="button-primary u-full-width"'); ?>
	</p>

	<?php form_close(); ?>

</section>