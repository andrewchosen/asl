<section id="profile">
	<h2>Edit Message</h2>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php echo form_open(base_url().'dashboard/edit_message?id=' . $message[0]->messageid); ?>

	<p>
	<?php echo form_label('Title: ', 'title'); ?>
	<?php echo form_error('title'); ?>
	<?php echo form_input('title', $message[0]->title, 'id="title" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_label('Message: ', 'message'); ?>
	<?php echo form_error('message'); ?>
	<?php echo form_textarea('message', $message[0]->message, 'id="message" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_submit('update', 'Update Message', 'class="button-primary"'); ?>
	</p>

	<?php form_close(); ?>