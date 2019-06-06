<!DOCTYPE html>
<?php 
include("includes/session.php");
include("includes/sideadmin.php");?>

<style>
  #zzz{
      padding: 15px;
      width: 211px;
  margin: 2px;
  border: 5px solid #ccc;
  opacity: 0.5;
  &:hover,
  &:focus {
    opacity: 1;
     &:hover {
      opacity: 1.5;
     } 
}
  }
</style>

<?php
  if ( isset($data['addcost']) )
  {
    $price = mysqli_query($connection, "INSERT INTO price (`cost`, `id_auto`) VALUES ('{$data['cost']}', '{$data['auto']}')");
    if ($price){
        echo "string"; header('location:add.php');
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addmodel']) )
  {
    $mod = mysqli_query($connection, "INSERT INTO car_model (`name`, `id_mark`) VALUES ('{$data['amodel']}', '{$data['mark']}')");
    if ($mod){
        echo "string"; header('location:add.php');
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addnumber']) )
  {
    $aut = mysqli_query($connection, "INSERT INTO auto ( `id_model`, `number`, `id_type`, `year`) VALUES ('{$data['model']}', '{$data['number']}', '{$data['type']}', '{$data['adate']}')");
    if ($aut){
        echo "string"; header('location:add.php');
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addmark']) )
  {
    $mark = mysqli_query($connection, "INSERT INTO car_mark (`name`) VALUES ('{$data['amark']}')");
    if ($mark){
        echo "string"; header('location:add.php');
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }
   
?>


<form action="add.php" method="post" class="text-center">
  <section id="description">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление новой марки</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название марки</h3>
            <input type="text" name="amark" placeholder="Марка" id="zzz"> 
          </div>
        <div class="col-md-2 col-md-offset-3">
            <h3></h3>
            <button name="addmark" type="submit" class="rent">Продолжить</button>
      </div>
    </div>

        <div class="row">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление новой модели</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название марки</h3>
            <select name="mark" id="zzz">
        <?php
    $query ="SELECT * FROM car_mark where id <> 0";
    $mark = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($mark)

    {
    $markrows = mysqli_num_rows($mark); // количество полученных строк

    for ($i = 0 ; $i < $markrows ; ++$i)
    {
        $markrow = mysqli_fetch_row($mark);
        echo " <option>$markrow[0] $markrow[1] </option>";
    }
    }else{echo "что-то пошло не так";}
     ?>
      </select>
          </div>
        <div class="col-md-3">
            <h3>Название модели</h3>
            <input type="text" name="amodel" placeholder="Модель" id="zzz"> 
      </div>
      <div class="col-md-2">
        <h3></h3>
        <button name="addmodel" type="submit" class="rent">Продолжить</button>
      </div>
    </div>


    <div class="row">
          <div class="col-md-1">
            <h3>Добавление нового автомобиля</h3>            
          </div>
          <div class="col-md-1 col-md-offset-1">
            <h3>Категория</h3>
            <select name="type" id="zzz" >
            <?php
    $query ="SELECT * FROM types where id <> 0";
    $type = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($type)

    {
    $typerows = mysqli_num_rows($type); // количество полученных строк

    for ($i = 0 ; $i < $typerows ; ++$i)
    {
        $typerow = mysqli_fetch_row($type);
        echo " <option>$typerow[0] $typerow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название модели</h3>
            <select name="model" id="zzz" >
            <?php
    $query ="SELECT * FROM car_model where id <> 0";
    $model = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($model)

    {
    $modelrows = mysqli_num_rows($model); // количество полученных строк

    for ($i = 0 ; $i < $modelrows ; ++$i)
    {
        $modelrow = mysqli_fetch_row($model);
        echo " <option>$modelrow[0] $modelrow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
        <div class="col-md-3">
            <h3>Номер авто</h3>            
           <input type="text" name="number" placeholder="Номер" id="zzz"> 
      </div>

      <div class="col-md-1">        
        <button name="addnumber" type="submit" class="rent">Продолжить</button>
      </div>
      <div class="col-md-5 col-md-offset-2">
        <label><h3>Дата выпуска:</h3></label><input type="date" name="adate" id="zzz">
      </div>
    </div>
    
    <div class="row" id="premium">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление нового товара</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Номер авто</h3>
            <select name="auto" id="zzz" >
            <?php
    $query ="SELECT `id`, `number` FROM auto where id <> 0";
    $auto = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($auto)

    {
    $autorows = mysqli_num_rows($auto); // количество полученных строк

    for ($i = 0 ; $i < $autorows ; ++$i)
    {
        $autorow = mysqli_fetch_row($auto);
        echo " <option>$autorow[0] $autorow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
        <div class="col-md-3">
            <h3>Цена за сутки</h3>            
           <input type="text" name="cost" placeholder="Цена" id="zzz"> 
      </div>
      <div class="col-md-2">
        <h3></h3>
        <button name="addcost" type="submit" class="rent">Продолжить</button>
      </div>
    </div>
  </div>
</section>
</form>
<?php include("includes/footer.php"); ?>