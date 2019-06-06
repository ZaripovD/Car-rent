<?php 
	require 'db.php';
	unset($_SESSION['logged']);
	header('Location: /rent/');
?>
