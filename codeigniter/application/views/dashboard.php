<h1><?php echo $user[1]->first_name."'s Dashboard"; ?></h1>

<div class="row">
<section id="messages" class="one-half column">
	<h2>Message Board</h2>
	<?php
	$i = 1;
	foreach ($messages as $message) { ?>
		<article>
			<h3><a href="<?php echo base_url().'dashboard/messages'; ?>"><?php echo $message->title; ?></a></h3>
			<p class="sub">Created by <?php echo $message->first_name; ?> <?php echo $message->last_name; ?> on <?php echo $message->created; ?></p>
		</article>
	<?php 
	if ($i++ == 4) break;
	} ?>
</section>
<section id="projects" class="one-half column">
	<h2>Current Projects</h2>
	<?php 
	foreach ($projects as $project) { ?>
	<article>
		<div class="table-row">
			<a href="<?php echo $project->url; ?>"><img src="<?php echo base_url().'uploads/clients/'.$project->client_image; ?>" alt="<?php echo $project->name; ?>" /></a>
			<div class="info">
				<h3><a href="<?php echo $project->url; ?>"><?php echo $project->description; ?></a></h3>
				<p><?php echo $project->name; ?></p>
			</div>
		</div>
	</article>
	<?php } ?>
</section>
</div>
<div class="row">
<section id="clients">
	<h2>Clients</h2>
	<?php
	$i = 0;
	foreach ($clients as $client) { 
		if($i === 0){
			echo "<div class='row'>";
		}?>
		<article class="three columns">
			<img src="<?php echo base_url().'uploads/clients/'.$client->client_image; ?>" alt="<?php echo $client->name; ?>" />
			<h3><?php echo $client->name; ?></h3>
		</article>
	<?php 
		$i++;
		if ($i === 4) {
			echo "</div>";
			$i = 0;
		}
	} ?>
</section>
</div>