<!DOCTYPE html>
<title>Личный кабинет</title>

<?php include("includes/session.php");

?>


<div class="container-fluid" >
<?php include("includes/sidebar.php") ?>

     <section id="personal">
      <div class="container">
        <div class="text-center">
            <h1>Личная карточка</h1>
            <div class="col-md-1 col-md-offset-10">
         <button><a href="PersEdit.php">Обновить данные</a></button> 
      </div>
          </div>
        <div class="row">
          <div class="col-md-3 col-md-offset-1">
            <h3>Фамилия:</h3>
            <p><?php echo $_SESSION['logged']->family;?></p>
            <h3>Имя:</h3>
            <p><?php echo $_SESSION['logged']->name; ?></p>
            <h3>Отчество:</h3>
            <p><?php echo $_SESSION['logged']->fathername; ?></p>
            <br>
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Номер лицензии:</h3>
            <p><?php echo $_SESSION['logged']->license;?></p>
            <h3>Номер телефона:</h3>
            <p><?php echo $_SESSION['logged']->phone; ?></p>
            <h3>Дата рождения:</h3>
            <p><?php echo $_SESSION['logged']->birthday; ?></p>
            <br>
          </div>
          <div class="col-md-3 col-md-offset-1">            
            <h3>Логин:</h3>
            <p><?php echo $_SESSION['logged']->login; ?></p>
            <h3>Электронная почта:</h3>
            <p><?php echo $_SESSION['logged']->email; ?></p>            
          </div>        
        </div>
 
    </section>
</div>

 <?php include("includes/footer.php"); ?>