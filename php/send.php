<?php

//прием постовых данных
$name=$_POST['name'];
$phone=$_POST['phone'];
$what=$_POST['what'];
//ящик адресата
$to = "GonZall00@yandex.ru";
//тема и сообщение
$subject = "Заявка с сайта аренды";
$message = "Письмо отправлено из моей формы. <br />
Пользователь хочет: ".htmlspecialchars($what)."<br />
Имя: ".htmlspecialchars($name)."<br />
Телефон: ".htmlspecialchars($phone);
$headers = "From: mysite.ru <site-email@mysite.ru>; Content-type: text/html;
charset=windows-1251";
mail ($to, $subject, $message, $headers);
echo "ВЫ УСПЕШНО ЗАПИСАНЫ! ПРИХОДИТЕ В ЛЮБОЕ ВРЕМЯ <a href='/rent/'>Назад</a>";

?> 	