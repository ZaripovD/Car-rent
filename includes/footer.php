 <footer id="contacts">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <div class="map">
              <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9891d8ccf152227c7da427d5d2d1de41a3a14e1640628e4d380c22a2850e429c&amp;width=320&amp;height=240&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
          </div>
          <div class="col-md-6">
            <h2>Контакты</h2>
            <div class="row">
              <address>
              <p id="address">
                Адрес:
              </p>
              <p id="almet">Адрес Альметьевский</p>
            </address>
            </div>

            <div class="row">
              <div class="phone_footer">
              <p id="phone_footer">
                Телефон:
              </p>
              <p id="number">+7 (999) 999-99-99</p>
            </div>
            </div>

            <div class="row socials">
              <a target="_blank" href="https://vk.com/stpdfckndck"><img id="vk" src="img/social/vk.png" alt="Вконтакте"></a>
              <a target="_blank" href="https://www.instagram.com/empty_book_about_everything"><img id="insta" src="img/social/insta.png" alt="Инстаграм"></a>
            </div>
          </div>
        </div>

        <div class="row details_row">
          <div class="col-md-4 details">
            <h5>CarRent</h5>
            <p>
              Сайт выполнен в рамках<br> учебной практики
            </p>
          </div>
          <div class="col-md-4 policy">
            <p>Альметьевск, 2019</p>
          </div>
          <div class="col-md-4 maker">
            <h4>Сайт разработал:</h4>
            <a href="https://vk.com/stpdfckndck" target="_blank">Зарип Данияров</a>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
        <div class="modal fade" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              </div>
              <div class="modal-body text-center">
               <div class="row">
                   <div class="header_modal">
                     <h4>Для записи на тест-драйв <br> оставьте свои данные</h4>
                   </div>
               </div>
               <div class="row">
                 <form action="php/send.php" method="post">
                   <div class="col-xs-12">
                     <input type="text" name="name" required placeholder="Имя..." class="form-control form_input">
                   </div>
                   <div class="col-xs-12">
                     <input type="text" name="phone"  required placeholder="Телефон..." class="form-control form_input">
                   </div>
                   <div class="col-xs-12">
                    <input type="hidden" name="what" value="Запись на тест-драйв">
                     <button type="submit">Записаться</button>
                   </div>
                 </form>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="policy_modal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>

              </div>

            </div>
          </div>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
    <script>
      $(document).ready(
          function() {
              $("html").niceScroll({cursorcolor:"#000"});
          }
      );
    </script>
    
    <link rel="stylesheet" href="css/animate.css">
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
  </body>
</html>