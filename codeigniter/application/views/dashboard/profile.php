<section id="profile">
	<h2>Profile</h2>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<p><strong>Member Since:</strong> <?php echo $user[1]->date_created ?></p>

	<?php echo form_open(base_url().'dashboard/profile'); ?>
	<p>
	<?php echo form_label('Email Address: ', 'email_address'); ?>
	<?php echo form_error('email_address2'); ?>
	<?php echo form_input('email_address2', $user[1]->email_address, 'id="email_address" class="u-full-width"'); ?>
	</p>
<div class="row">
	<div class="one-half column">
	<?php echo form_label('First Name: ', 'first_name'); ?>
	<?php echo form_error('first_name'); ?>
	<?php echo form_input('first_name', $user[1]->first_name, 'id="first_name" class="u-full-width"'); ?>
	</div>
	<div class="one-half column">
	<?php echo form_label('Last Name: ', 'last_name'); ?>
	<?php echo form_error('last_name'); ?>
	<?php echo form_input('last_name', $user[1]->last_name, 'id="last_name" class="u-full-width"'); ?>
	</div>
</div>

<div class="row">
	<?php echo form_label('Bio: ', 'bio'); ?>
	<?php echo form_error('bio'); ?>
	<?php echo form_textarea('bio', $user[1]->bio, 'id="bio" class="u-full-width"'); ?>
</div>

	<p>
	<?php echo form_submit('update', 'Update Profile', 'class="button-primary"'); ?>
	</p>

	<?php form_close(); ?>
	<?php echo validation_errors(); ?>
</section>