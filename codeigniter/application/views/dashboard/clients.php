<h1>Clients</h1>
<section id="create-client">
	<?php echo $this->session->flashdata('error_msg'); ?>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php echo form_open_multipart(base_url().'dashboard/clients'); ?>

	<p>
	<?php echo form_label('Client Name: ', 'name'); ?>
	<?php echo form_error('name'); ?>
	<?php echo form_input('name', set_value('name'), 'id="name" class="u-full-width"'); ?>
	</p>

	<p>
	<?php echo form_label('Image: ', 'image'); ?>
	<?php echo form_error('image'); ?>
	<input type="file" name="image" size="20" />
	</p>

	<p>
	<?php echo form_submit('create', 'Add Client'); ?>
	<?php form_close(); ?>
</section>	
<section id="client-list">
	<?php
	foreach ($clients as $client) { ?>
		<article class="one-third column">
			<img src="<?php echo base_url().'uploads/clients/'.$client->client_image; ?>" />
			<h3><?php echo $client->name; ?></h3>
		</article>
	<?php } ?>
</section>