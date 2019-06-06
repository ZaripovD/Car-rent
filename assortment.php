<!DOCTYPE html>
<?php  include("includes/session.php") ?>

<?php
$sesid = $_SESSION['logged']->id;
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


echo "<div class='container'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='col-md-4'>
     <div class='title'>
        <h2>{$result['Марка']}</h2>
        <h3>{$result['Модель']}</h3>
     </div>
     <div class='info'>
         <p>Класс: {$result['Класс']}</p>

         <p>Дата выпуска: {$result['Дата выпуска']}</p>

         
         <button data-id='{$result['ID']}' data-toggle='modal' href='#rent_modal'><a href='?rent_id={$result['ID']}'>арендо</a>вать</button>
     </div>
 </div>";
    }
echo "</div>";

 if (isset($_GET['rent_id'])) {

  $sql = mysqli_query($connection,
 "SELECT price.id as 'ID', types.name as 'Класс', car_mark.name as 'Марка', car_model.name as 'Модель', auto.number as 'Номер', auto.year as 'Дата выпуска', price.cost as 'Цена за сутки'
   FROM price
   left join auto on price.id_auto = auto.id
   left join types on auto.id_type = types.id
   left JOIN car_model on auto.id_model = car_model.id
   left join car_mark on car_model.id_mark = car_mark.id
   where price.id = {$_GET['rent_id']}");

if (!$sql) {
  echo mysqli_error($connection);
}

while ($result = mysqli_fetch_array($sql)) {
  echo "
   <form action='assortment.php' method='post'>
 <div class='modal fade' id='rent_modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h1>Аренда <span>{$result['Марка']} </span><span>{$result['Модель']}</span></h1>
              </div>
              <div class='modal-body'>
              <div class='row'>
               <div class='col-sm-3'>
  <label> Класс: {$result['Класс']}</label>
    <label>Номер: {$result['Номер']}</label>
    
</div>
<div class='col-sm-5'>
  <h4>Начало аренды</h4>
  <input type='date' name='startR'>
  <h4>Конец аренды</h4>
<input type='date' name='endR'>
</div>
<div class='col-sm-4'>  
    <input type='hidden' name='costR' value='{$result['Цена за сутки']}'>
    <label name='cost' >Цена за сутки: {$result['Цена за сутки']} руб</label>     
    <input type='hidden' name='idi' value='{$result['ID']}'> 
    <input type='hidden' name='what' value='Арендовать {$result['Марка']} {$result['Модель']}'>
</div>
</div>
<div class='col-md-12'>

  <button type='submit' name='go_rent' id='test'>Арендовать</button>

</div>
</div>
              </div>
            </div>
          </div>
        
        </form>";
}
}
$mark=$result['Марка'];
      $model=$result['Модель'];
  if ( isset($data['go_rent']) )
    { if (!$ses){
  echo "<div class='row text-center'> <h4>Аренда доступна только авторизованным пользователям!</div></h4>";
 }else{
      
      $startR = strtotime($data['startR']);
      $endR = strtotime($data['endR']);
      $days = ($endR - $startR) / (60 * 60 * 24);
      $cd = $data['costR'];      
      $sum = $days * $cd;
       $rent = mysqli_query($connection,"
         INSERT INTO rent
         (`id_user`, `start_rent`, `end_rent`, `id_price`, `summary`) VALUES
         ('$sesid', '{$data['startR']}', '{$data['endR']}', {$data['idi']}, '$sum') ");
      
      if (!$rent) {
  echo mysqli_error($connection);
}else {
    
    $name=$_SESSION['logged']->login;
    $phone=$_SESSION['logged']->phone;
    $what=$_POST['what'];
    //ящик адресата
    $to = "GonZall00@yandex.ru";
    //тема и сообщение
    $subject = "Заявка с сайта аренды";
    $message = "Письмо отправлено из моей формы. 
    Пользователь хочет: ".htmlspecialchars($what)."
    Логин: ".htmlspecialchars($name)."
    Телефон: ".htmlspecialchars($phone)."
    С: ".htmlspecialchars($data['startR'])."
    По: ".htmlspecialchars($data['endR'])."
    Сумма к оплате: ". htmlspecialchars($sum)." рублей";
    $headers = "From: mysite.ru <site-email@mysite.ru>; Content-type: text/html;
    charset=utf-8";
    mail ($to, $subject, $message, $headers);

    echo "<div class='row text-center'> <h4>Товар арендован! Приходите {$data['startR']} в любой рабочий час и заберите его. При себе необходимо иметь водительское удостоверение и паспорт.<br> Сумма к оплате: $sum руб</div></h4>";    
}
}
    }

  ?>
<?php include("includes/footer.php"); ?>
