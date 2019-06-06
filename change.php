<?php 
include("includes/session.php");

 	$nam  = isset($data['name']);
 	$fam = isset($data['family']);
 	$fat = isset($data['fathername']);
 	$lic = isset($data['license']);
 	$pho = isset($data['phone']);
 	$email = isset($data['email']);
 	
 	$sql = mysqli_query($connection, "UPDATE `user` SET `name` = '$nam', `family` = '$fam', `fathername` = '$fat', `license` = '$lic', `phone` = '$pho', `email` = '$email' WHERE id = '$sesid'");
 	if ($sql){
 		echo "URA";
 	}
 	else{
 		echo mysqli_error($connection);
 	}
 	

 ?>