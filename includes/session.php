<?php require 'php/db.php';?>

 <div class="row" id="session" style="text-align: right; padding-right: 50px;"> 
<?php 


$data = $_POST;
  if (isset ($_SESSION['logged'])) {
    $sesid = $_SESSION['logged']->id;
$ses = $_SESSION['logged'];
  	
   if ($_SESSION['logged']->id_role == 2) {
     include("includes/header3.php"); 
   echo ('Вы администратор '); echo $_SESSION['logged']->login; 

  } else {

    include("includes/header2.php"); 
   echo ('Вы вошли как '); echo $_SESSION['logged']->login; 

}
} else {
 error_reporting(0);
    include("includes/header.php"); 
   echo 'Вы вошли как гость';

}


 ?>
</div> 

