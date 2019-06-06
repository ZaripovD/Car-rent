<?php 
include("includes/session.php");
 	
 	
 	$nam  = isset($data['name']);
 	$fam = isset($data['family']);
 	$fat = isset($data['fathername']);
 	$lic = isset($data['license']);
 	$pho = isset($data['phone']);
 	$email = isset($data['email']);

 	$sql = mysqli_query($connection, "UPDATE user SET user.name = {$nam}, user.family = {$fam}, user.fathername = {$fat}, user.license = {$lic}, user.phone = {$pho}, user.email = {$email} WHERE id = $_SESSION['logged']->id");
 
 ?>