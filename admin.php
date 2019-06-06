<!DOCTYPE html>
<?php include("includes/session.php") ;
include("includes/sideadmin.php");?>
<section id="personal">
      <div class="container">
        <div class="text-center">
            <h1>Товары</h1>
            <div class="col-md-1 col-md-offset-11"></div>
      </div>
<?php 

if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
  $del = mysqli_query($connection, "DELETE FROM `price` WHERE `id_auto` = {$_GET['del_id']}");
  $up = mysqli_query($connection, "UPDATE `rent` SET `id_price` = 0 where rent.id_price= {$_GET['del_id']}");    
     
    if ($del) {
       if ($up){
      echo "<p>Товар удален.</p>";
    }  
  }else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
 
}
$sql = mysqli_query($connection,
  "SELECT price.id as 'ID', types.name as 'Класс', car_mark.name as 'Марка', car_model.name as 'Модель', auto.number as 'Номер', auto.year as 'Дата выпуска', price.cost as 'Цена за сутки'
   FROM price    
   left join auto on price.id_auto = auto.id
   left join types on auto.id_type = types.id
   left JOIN car_model on auto.id_model = car_model.id
   left join car_mark on car_model.id_mark = car_mark.id
   WHERE price.id <> '0'");

if (!$sql) { 
  echo mysqli_error($connection);
}
echo "<div class='container text-center'>";

while ($result = mysqli_fetch_array($sql)) {
      echo " <div class='row'> 
         <div class='col-md-2'>
              <h5>ИД автомобиля</h5>
              {$result['ID']}
         </div>

     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              {$result['Класс']}
         </div>

         <div class='col-md-1'>
              <h5>Марка</h5>
              {$result['Марка']}
         </div>

         <div class='col-md-1'>
              <h5>Модель</h5>
              {$result['Модель']}
         </div>

         <div class='col-md-1'>
              <h5>Номер</h5>
              {$result['Номер']}
         </div>         

         <div class='col-md-3'>
              <h5>Цена за сутки</h5>
              {$result['Цена за сутки']} Руб
         </div>

         <div class='col-md-1'>
         <h5> <a href='?del_id={$result['ID']}'>Удалить</a></h5>
              
         </div>  

         <div class='col-md-1'>
         <h5> <a href='?red_id={$result['ID']}'>Изменить</a></h5>
              
         </div>
 </div></div> ";
    }
echo "</div>";


  if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($connection, "DELETE FROM `price` WHERE `ID` = {$_GET['del_id']}");
    if ($sql) {
      echo "<p>Товар удален.</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
  }
if (isset($_GET['red_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($connection, "SELECT price.id as 'ID', types.name as 'Класс', car_mark.name as 'Марка', car_model.name as 'Модель', auto.number as 'Номер', auto.year as 'Дата выпуска', price.cost_hour as 'Цена за час', price.cost_day as 'Цена за сутки'
   FROM price    
   left join auto on price.id_auto = auto.id
   left join types on auto.id_type = types.id
   left JOIN car_model on auto.id_model = car_model.id
   left join car_mark on car_model.id_mark = car_mark.id
   where 'ID' = {$_GET['red_id']}");

  if (!$sql) { 
  echo mysqli_error($connection);
}
echo "<div class='container text-center'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='row'>
         <div class='col-md-1'>
              <h5>ИД автомобиля</h5>
              <input>{$result['ID']}</input>
         </div>
     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              <input>{$result['Класс']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Марка</h5>
              <input>{$result['Марка']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Модель</h5>
              <input>{$result['Модель']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Номер</h5>
              <input>{$result['Номер']}</input>
         </div>         
         <div class='col-md-1'>
              <h5>Цена за час</h5>
              <input>{$result['Цена за час']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Цена за сутки</h5>
             <input> {$result['Цена за сутки']}</input>
         </div>
         <div class='col-md-1'>
         <h5> </h5>
              <a href='?del_id={$result['ID']}'>Удалить</a>
         </div>  
         <div class='col-md-1'>
         <h5> </h5>
              <a href='?red_id={$result['ID']}'>Изменить</a>
         </div>               
         
     </div>
 </div>";
    }
echo "</div>";

}
 ?>

</div>
 
    </section>
</div>
 
<?php include("includes/footer.php"); ?>


