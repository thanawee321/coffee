<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

 $id_food = $_POST['id_food'];
 $id_status = $_POST['status_product_food'];

$query = "UPDATE coffee.product_food SET id_status = $id_status WHERE id_product_food=$id_food";
update($query);



Header('Refresh:0; url=../foodManage.php');
?>