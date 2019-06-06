<?php 
include("includes/session.php");
	if (isset ($_SESSION['logged'])) {
		header('location:persarea.php');
	} else {
		header('location:registration.php');
	}
	
 ?>