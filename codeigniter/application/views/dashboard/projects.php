<h1>Projects</h1>
<section class="create-project">
	<?php echo $this->session->flashdata('error_msg'); ?>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php echo form_open(base_url().'dashboard/projects'); ?>

	<p>
	<?php echo form_label('Project Description: ', 'description'); ?>
	<?php echo form_error('description'); ?>
	<?php echo form_input('description', set_value('description'), 'id="description" class="u-full-width"'); ?>
	</p>

	<div class="row">
		<p class="one-half column">
			<?php echo form_label('URL: ', 'url'); ?>
			<?php echo form_error('url'); ?>
			<?php echo form_input('url', set_value('url'), 'id="url" class="u-full-width"'); ?>
		</p>

		<p class="one-half column">
			<?php
			$options = array();
			foreach ($clients as $client) {
				$options[$client->clientid] = $client->name;
			}
			echo form_label('Client: ', 'client');
			echo form_error('client');
			echo form_dropdown('client', $options);

		?>
	</div>

	<p>
	<?php echo form_submit('create', 'Create Project', "class='button-primary'"); ?>
	<?php form_close(); ?>
</section>
<section id="project-list">
	<?php
	$i = 0;
	foreach ($projects as $project) { 
		if($i === 0){
			echo "<div class='row'>";
		}?>
		<article class="one-third column">
			<img src="<?php echo base_url().'uploads/clients/'.$project->client_image; ?>" />
			<h3><?php echo $project->description; ?></h3>
			<p><strong>Client: </strong><?php echo $project->name; ?></p>
			<a class="button" href="<?php echo $project->url ?>">Launch Project</a>
		</article>
	<?php 
		$i++;
		if ($i === 3) {
			echo "</div>";
			$i = 0;
		}
	} ?>
</section>