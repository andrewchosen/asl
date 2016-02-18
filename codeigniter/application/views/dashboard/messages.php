<a class="create button button-primary u-pull-right u-cf">New Message</a>
<h1>Messages</h1>
<section class="create-msg" style="display: none;">
	<?php echo $this->session->flashdata('error_msg'); ?>
	<?php echo form_open(base_url().'dashboard/messages'); ?>

	<p>
	<?php echo form_label('Title: ', 'title'); ?>
	<?php echo form_error('title'); ?>
	<?php echo form_input('title', set_value('title'), 'id="title" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_label('Message: ', 'message'); ?>
	<?php echo form_error('message'); ?>
	<?php echo form_textarea('message', set_value('message'), 'id="message" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_submit('submit', 'Submit'); ?>
	</p>
</section>
<section id="messages">
	<article>
		<h2>Message title #1</h2>
		<div class="body">
			<p>Here is the body of the message.</p>
		</div>
	</article>
</section>