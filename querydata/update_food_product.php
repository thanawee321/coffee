<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

$action = "แก้ไขข้อมูล";
$name = $_SESSION['admin_name_login'];

echo $id_product_food = $_POST['id_product_food'];
echo $name_food = $_POST['name_food'];
echo $food_price = $_POST['food_price'];


$query = "UPDATE coffee.product_food SET food_product = '$name_food', food_price = $food_price WHERE id_product_food=$id_product_food";
update($query);

$message = $name_food."ที่ ID : ".$id_product_food;
log_des($action,$message,$name);

mysqli_close($connect);
Header('Refresh:0; url=../foodManage.php');


?>