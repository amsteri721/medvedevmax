<?php
	define('hostname', '127.0.0.1');
	define('login', 'root');
	define('password', '1111');
	try {
		$handler = new PDO('mysql:host='.hostname.';dbname=medvedev', login, password);
		$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "ERROR: " . $e->getMessage();
		die();
	}
	$handler->exec('SET CHARACTER SET utf8');
?>