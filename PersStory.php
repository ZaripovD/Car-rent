<!DOCTYPE html>
<title>Личный кабинет</title>

<?php include("includes/session.php") ?>

<div class="container-fluid" >
  <?php include("includes/sidebar.php") ?>
     

     <section id="personal">
      <div class="container">
        <div class="text-center">
            <h1>История операций</h1>
            <div class="col-md-1 col-md-offset-11"></div>
      </div>
    <?php 
$sesid = $_SESSION['logged']->id;


$sql = mysqli_query($connection,
  "SELECT rent.id as 'Номер операции', types.name as 'Класс', car_mark.name as 'Марка', car_model.name as 'Модель', auto.number as 'Номер', rent.start_rent as 'Начало аренды', rent.end_rent as 'Конец аренды', fines.name as 'Штрафы', rent.summary as 'Всего', price.cost as 'Цена за сутки'
   FROM user
   left join rent on user.id = rent.id_user 
   left JOIN price on rent.id_price = price.id
   left join auto on price.id_auto = auto.id   
   left JOIN car_model on auto.id_model = car_model.id
   left join car_mark on car_model.id_mark = car_mark.id
   left join fines on rent.id_fines = fines.id
   left join types on auto.id_type = types.id
   where user.id = $sesid");

if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='row'>
         <div class='col-md-1'>
              <h5>Номер операции</h5>
              {$result['Номер операции']}
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
              <h5>Цена за сутки</h5>
              {$result['Цена за сутки']}
         </div>
         <div class='col-md-1'>
              <h5>Штрафы</h5>
              {$result['Штрафы']}
         </div>
         <div class='col-md-12'>
              <h3>Всего
              {$result['Всего']} Руб</h3>
         </div>       
         
     </div>
 </div>";
    }
echo "</div>";



 ?>
        
    </div>
 
    </section>
</div>

 <?php include("includes/footer.php"); ?>


