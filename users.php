<?php include("includes/session.php");
include("includes/sideadmin.php"); ?>

<section id="personal">
      <div class="container">
        <div class="text-center">
            <h1>Пользователи</h1>
            <div class="col-md-1 col-md-offset-11"></div>
      </div>

      <?php

if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
  
  $up =  mysqli_query($connection, "UPDATE `rent` SET `id_user` = 0 where rent.id_user= {$_GET['del_id']}");
  $delu = mysqli_query($connection, "DELETE FROM `user` WHERE `id` = {$_GET['del_id']}");
     
    if ($delu) {
      header('location:users.php'); 
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';

  }
  }
  





$sql = mysqli_query($connection,
  "SELECT user.id as 'ИД', user.family as 'Фам', user.name as 'Имя',  user.birthday as 'ДР', user.license_get as 'лиц', user.phone as 'тел', user.email as 'поч', user.login as 'лог'
   FROM user
   WHERE user.id <> 0");

if (!$sql) { 
  echo mysqli_error($connection);
}
echo "";

while ($result = mysqli_fetch_array($sql)) {
      echo "<div class='container text-center'>
      <div class='row'>
         <div class='col-md-1'>
              <h5>ИД клиента</h5>
              {$result['ИД']}
         </div>
     <div class='info'>
         <div class='col-md-1'>
              <h5>Фамилия</h5>
              {$result['Фам']}
         </div>
         <div class='col-md-1'>
              <h5>Имя</h5>
              {$result['Имя']}
         </div>
         
         <div class='col-md-2'>
              <h5>Дата рождения</h5>
              {$result['ДР']}
         </div>         
         <div class='col-md-2'>
              <h5>Лицензия получена</h5>
              {$result['лиц']}
         </div>
         <div class='col-md-1'>
              <h5>Номер телефона</h5>
              {$result['тел']}
         </div>
         <div class='col-md-2'>
              <h5>Почта</h5>
              {$result['поч']}
         </div>
         <div class='col-md-1'>
              <h5>Логин</h5>
              {$result['лог']}
         </div>
         <div class='col-md-1'>
         <h5> </h5>
              <a href='?del_id={$result['ИД']}'>Удалить</a>
         </div>      
     </div>
 </div></div>";
    }
echo "";

?>
</div>
 
    </section>
</div>
 <?php include("includes/footer.php"); ?>