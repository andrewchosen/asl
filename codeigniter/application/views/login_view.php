<section id="login" class="one-half column">
	<h2>Login</h2>
	<?php echo form_open('http://giantfist.com/asl/admin'); ?>

	<p>
	<?php echo form_label('Email Address: ', 'email_address'); ?>
	<?php echo form_input('email_address', set_value('email_address'), 'id="email_address" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_label('Password: ', 'password'); ?>
	<?php echo form_password('password', '', 'id="password" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_submit('submit', 'Login'); ?>
	</p>

	<?php form_close(); ?>

	<div class="errors"><?php echo validation_errors(); ?></div>
</section>