<h1><?php echo $user[1]->first_name."'s Dashboard"; ?></h1>

<div class="class">
<section id="messages" class="one-half column">
	<h2>Message Board</h2>
	<?php
	$i = 1;
	foreach ($messages as $message) { ?>
		<article>
			<h3><a href="#"><?php echo $message->title; ?></a></h3>
			<p class="sub">Created by <?php echo $message->first_name; ?> <?php echo $message->last_name; ?> on <?php echo $message->created; ?></p>
		</article>
	<?php 
	if ($i++ == 4) break;
	} ?>
</section>
<section id="projects" class="one-half column">
	<h2>Current Projects</h2>
	<article>
		<div class="table-row">
			<a href="#"><img src="images/project1.jpg" alt="Project 1"></a>
			<div class="info">
				<h3><a href="#">Project #1</a></h3>
				<p>Client Name</p>
			</div>
		</div>
	</article>
	<article>
		<div class="table-row">
			<a href="#"><img src="images/project1.jpg" alt="Project 1"></a>
			<div class="info">
				<h3><a href="#">Project #1</a></h3>
				<p>Client Name</p>
			</div>
		</div>
	</article>
	<article>
		<div class="table-row">
			<a href="#"><img src="images/project1.jpg" alt="Project 1"></a>
			<div class="info">
				<h3><a href="#">Project #1</a></h3>
				<p>Client Name</p>
			</div>
		</div>
	</article>
</section>
</div>
<div class="row">
<section id="clients" class="one-half column">
	<h2>Clients</h2>
	<article>
		<a href="#"><img src="images/project1.jpg"></a>
		<h3><a href="#">Client Name</a></h3>
	</article>
	<article>
		<a href="#"><img src="images/project1.jpg"></a>
		<h3><a href="#">Client Name</a></h3>
	</article>
	<article>
		<a href="#"><img src="images/project1.jpg"></a>
		<h3><a href="#">Client Name</a></h3>
	</article>
</section>
</div>