<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

$name = $_SESSION['admin_name_login'];
$action = "แก้ไขข้อมูล";

$id_coffee_update = $_POST['id_product_update'];
$name_coffee_update = $_POST['name_coffee_update'];
$hot_price_update = $_POST['hot_price_update'];
$ice_price_update = $_POST['ice_price_update'];

$query = "UPDATE coffee.product_coffee
SET coffee_product = '$name_coffee_update',hot_price = $hot_price_update,ice_price = $ice_price_update
WHERE id_product= $id_coffee_update ";

update($query);

$message = $name_coffee_update."ที่ ID : ".$id_coffee_update;
log_des($action,$message,$name);

Header('Refresh:0; url=../coffeeManage.php');
?>
