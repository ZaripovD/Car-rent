<!DOCTYPE html>

<?php  include("includes/session.php") ?> 

    <section id="main">
      <div class="container">
        <div class="row main-header">
          <h1><span>Арендуй автомобиль</span><br><span>и катись с ветерком </span></h1>
        </div>
          <div class="row">
            <h3>Устрой тест-драйв в нашем парке. <span>Это бесплатно!</span></h3>
          </div>
          <div class="row main_buttons">
            <button data-toggle="modal" href="#test_modal" id="test">Записаться на тест-драйв</button>
            <a href="become.php"><button id="get_types">Стать постоянным клиентом</button></a>
          </div>
      </div>
    </section>



    <section id="description">
      <div class="container">
        <div class="row" id="econom">
          <div class="col-md-4 col-md-offset-1">
            <h3>Класс 'Эконом'</h3>
            <br>
            <p>Недорого и неброско! Только возможность быстро проходить маршруты, никакого пафоса</p><br>
          </div>
          <div class="col-md-2 col-md-offset-1">
            <h3>Тарифы</h3>
            <p>По суткам: от 800 рублей</p><br>
            <a href="assortment.php"><button class="rent" data-toggle="modal">Просмотреть каталог</button></a>
          </div>
        <div class="col-md-2 col-md-offset-1">
          <img src="img/types/eco.png" alt="Помощь">
      </div>
    </div>
    <div class="row" id="comfort">
          <div class="col-md-4 col-md-offset-1">
            <h3>Класс 'Комфорт'</h3>
            <br>
            <p>Удобно, так неожиданно и приятно. Для любителей непросто езды, но очень комфортной езды.</p><br>
          </div>
          <div class="col-md-2 col-md-offset-1">
            <h3>Тарифы</h3>
            <p>По суткам: от 1100 рублей</p><br>
            <a href="assortment.php"><button class="rent" data-toggle="modal">Просмотреть каталог</button></a>
          </div>
        <div class="col-md-2 col-md-offset-1">
          <img src="img/types/comf.jpeg" alt="Помощь">
      </div>
    </div>
    <div class="row" id="premium">
          <div class="col-md-4 col-md-offset-1">
            <h3>Класс 'Премиум'</h3>
            <br>
            <p>Пафос, прожекторы, фанфары! Машины этого класса дадут всем знать, кто тут чиновник!.</p><br>
          </div>
          <div class="col-md-2 col-md-offset-1">
            <h3>Тарифы</h3>
            <p>По суткам: от 1500 рублей</p><br>
            <a href="assortment.php"><button class="rent" data-toggle="modal">Просмотреть каталог</button></a>
          </div>
        <div class="col-md-2 col-md-offset-1">
          <img src="img/types/prem.jpg" alt="Помощь">
      </div>
    </div>
  </div>
    </section>

     <?php include("includes/footer.php"); ?>