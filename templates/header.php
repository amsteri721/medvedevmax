<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="navbar">
		<ul>
			<li><a href="?">HOME</a></li>
			<?php if($_SESSION['login']=='admin') {?>
			<li><a href="?act=add-entry">Add entry</a></li>
			<?php } ?>
			<?php if(isset($_SESSION['login'])) {?>
			<li><a href="?act=logout"><?=$_SESSION['login'];?> : Logout</a></li>
			<?php } else {?>
			<li><a href="?act=login">Login</a></li>
			<li><a href="?act=reg">Registration</a></li>
			<?php } ?>
		</ul>
	</div>
