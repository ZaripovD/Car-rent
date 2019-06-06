<?php 
require 'libs/rb.php';

 R::setup( 'mysql:host=localhost;dbname=car_rent','root', '' ); 

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start(); ?>

<?php $connection = mysqli_connect("localhost", "root", "", "car_rent");
mysqli_query($connection, "SET NAMES 'utf8");
mysqli_query($connection, "SET CHARACTER SET 'utf8'"); ?>