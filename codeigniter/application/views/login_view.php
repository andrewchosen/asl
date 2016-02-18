<section id="login" class="one-half column">
	<h2>Login</h2>
	<?php echo $this->session->flashdata('error_msg'); ?>
	<?php echo form_open(base_url().'admin'); ?>

	<p>
	<?php echo form_label('Email Address: ', 'email_address'); ?>
	<?php echo form_error('email_address'); ?>
	<?php echo form_input('email_address', set_value('email_address'), 'id="email_address" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_label('Password: ', 'password'); ?>
	<?php echo form_error('password'); ?>
	<?php echo form_password('password', '', 'id="password" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_submit('submit', 'Login'); ?>
	</p>

	<?php form_close(); ?>
</section>