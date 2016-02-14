<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="logo one-third column">Dashboard</div>
			<nav class="two-thirds column">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="#">Messages</a></li>
					<li><a href="#">Clients</a></li>
					<li><a href="#">Projects</a></li>
					<li><a href="#">Profile</a></li>
					<?php
					$session_user = $this->session->userdata('email_address');
					if (isset($session_user)) {
						echo '<li><a href="' . base_url() . 'logout">Logout</a></li>';
					} ?>
					
				</ul>
			</nav>
		</div>
	</header>
	<section id="main">
		<div class="container">