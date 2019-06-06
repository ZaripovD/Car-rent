<!DOCTYPE html>
<title>Личный кабинет</title>

<?php include("includes/session.php");

if (isset($_GET['change'])) {
  $nam  = isset($data['name']);
  $fam = isset($data['family']);
  $fat = isset($data['fathername']);
  $lic = isset($data['license']);
  $pho = isset($data['phone']);
  $email = isset($data['email']);
  
  $sql = mysqli_query($connection, "UPDATE `user` SET `name` = '{$data['name']}', `family` = '{$data['family']}', `fathername` = '{$data['fathername']}', `license` = '{$data['license']}', `phone` = '{$data['phone']}', `email` = '{$data['email']}' WHERE id = '$sesid'");
  if ($sql){
    echo "URA";
  }
  else{
    echo mysqli_error($connection);
  }
}

 ?>



<div class="container-fluid" >
      
<?php include("includes/sidebar.php") ?>

     <section id="personal">
      <div class="container">
        <form action="PersEdit.php" meathod="POST">
        <div class="text-center">
            <h1>Изменение личной информации</h1>
            <div class="col-md-1 col-md-offset-10">
          <button><a href="PersArea.php">Назад</a></button>
      </div>
          </div>
        <div class="row" id="scooter">
          
          <div class="col-md-3 col-md-offset-1">
            <h3>Фамилия:</h3>
            <input type="text" value="<?php echo $_SESSION['logged']->family; ?>" name="family">
            <h3>Имя:</h3>
            <input type="text" value="<?php echo $_SESSION['logged']->name; ?>" name="name">
            <h3>Отчество:</h3>
            <input type="text" value="<?php echo $_SESSION['logged']->fathername; ?>" name="fathername">
            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Номер лицензии:</h3>
            <input type="" value="<?php echo $_SESSION['logged']->license;?>" name="license">
            <h3>Номер телефона:</h3>
            <input type="" value="<?php echo $_SESSION['logged']->phone; ?>" name="phone">
           
          </div>
          <div class="col-md-3 col-md-offset-1">            
            <h3>Логин:</h3>
            <input type="text" value="<?php echo $_SESSION['logged']->login; ?>" name="login">
            <h3>Электронная почта:</h3>
            <input type="text" value="<?php echo $_SESSION['logged']->email; ?>" name="email">            
          </div>
          <div class="col-md-3 col-md-offset-1"><br>
            <button type="submit" name="change">Изменить</button>
          </div>
        </form>
         </div>
    </div>
 
    </section>
</div>

 <?php include("includes/footer.php"); ?>