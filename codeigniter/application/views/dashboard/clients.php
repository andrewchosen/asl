<a class="create button button-primary u-pull-right u-cf">Add Client</a>
<h1>Clients</h1>
<section id="create-client" class="slide-target" style="display: none;">
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
	<?php echo form_submit('create', 'Submit'); ?>
	<?php form_close(); ?>
</section>	
<section id="client-list">
	<?php
	$i = 0;
	foreach ($clients as $client) { 
		if($i === 0){
			echo "<div class='row'>";
		}?>
		<article class="one-third column">
			<img src="<?php echo base_url().'uploads/clients/'.$client->client_image; ?>" />
			<h3><?php echo $client->name; ?></h3>
		</article>
	<?php 
		$i++;
		if ($i === 3) {
			echo "</div>";
			$i = 0;
		}
	} ?>
</section>