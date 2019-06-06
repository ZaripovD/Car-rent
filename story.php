<!DOCTYPE html>

<?php include("includes/session.php"); ?>

<div class="container-fluid" >
  <?php include("includes/sideadmin.php") ?>
     

     <section id="personal">
      <div class="container">
        <div class="text-center">
            <h1>История операций</h1>
            <div class="col-md-1 col-md-offset-11"></div>
      </div>
<?php

if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
  $del = mysqli_query($connection, "DELETE FROM `rent` WHERE `id` = {$_GET['del_id']}"); 
     
    if ($del) {       
      echo "<p>Мир забыл об этой операции.</p>";
    } 
  else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
 
}

$sql = mysqli_query($connection,
  "SELECT rent.id as 'Номер операции', types.name as 'Класс', car_mark.name as 'Марка', car_model.name as 'Модель', auto.number as 'Номер', rent.start_rent as 'Начало аренды', rent.end_rent as 'Конец аренды', fines.name as 'Штрафы', rent.summary as 'Всего', price.cost as 'Цена за сутки', user.id as 'ID', user.login as 'login', fines.cost as 'fines'
   FROM rent
   left join user on rent.id_user = user.id 
   left JOIN price on rent.id_price = price.id
   left join auto on price.id_auto = auto.id   
   left JOIN car_model on auto.id_model = car_model.id
   left join car_mark on car_model.id_mark = car_mark.id
   left join fines on rent.id_fines = fines.id
   left join types on auto.id_type = types.id
   ");

if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='row'>
        <div class='mainifo'>
         <div class='col-md-1'>
              <h5>Номер операции</h5>
              {$result['Номер операции']}
         </div>
         <div class='col-md-1'>
              <h5>ИД клиента</h5>
              {$result['ID']}
         </div>
         <div class='col-md-1'>
              <h5>Логин клиента</h5>
              {$result['login']}
         </div>
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
         <div class='col-md-2'>
              <h5>Начало аренды</h5>
              {$result['Начало аренды']}
         </div>
         <div class='col-md-2'>
              <h5>Конец аренды</h5>
              {$result['Конец аренды']}
         </div>         
         <div class='col-md-1'>
              <h5>Штрафы</h5>
              {$result['Штрафы']}
         </div>
      </div>
      
         <div class='col-md-12'>
              <h3>Всего
              {$result['Всего']} Руб</h3>
         </div> 
         <div class='col-md-6'>
              <h3>Сумма штрафов
              {$result['fines']} Руб</h3>
         </div>  
         <div class='col-md-3'>
              <h3><a href='?del_id={$result['Номер операции']}'>Удалить</a></h3>
         </div>
            
        
     </div>";
    }
echo "</div>";

?>
</div>
 
    </section>
</div>
<?php include("includes/footer.php"); ?>