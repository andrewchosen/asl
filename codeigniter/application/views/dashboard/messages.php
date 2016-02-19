<a class="create button button-primary u-pull-right u-cf">New Message</a>
<h1>Messages</h1>
<?php echo $this->session->flashdata('success_msg'); ?>
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
	<pre><?php echo form_textarea('message', set_value('message'), 'id="message" class="u-full-width"'); ?></pre>
	</p>

	<p>
	<?php echo form_submit('submit', 'Submit'); ?>
	</p>
</section>
<section id="message-board">
	<?php

	?>
		<?php
		foreach ($messages as $message) { ?>
		<article>
			<h2><?php echo $message->title; ?></h2>
			<p>Created by <?php echo $message->first_name; ?> on <?php echo $message->created; ?></p>
			<div class="body">
				<p><?php echo $message->message; ?></p>
			</div>
		</article>
		 <?php } ?>
</section>