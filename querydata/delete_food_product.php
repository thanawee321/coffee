<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';
$action = "ลบข้อมูล";
$name = $_SESSION['admin_name_login'];

echo $id_food = $_REQUEST['id_food'];
echo $name_food = $_REQUEST['name_food'];

$query = "DELETE FROM coffee.product_food WHERE id_product_food=$id_food";
delete($query);

$message = $name_food." ที่อยู่ใน ID : $id_food";
log_des($action,$message,$name);
mysqli_close($connect);
Header('Refresh:0; url=../foodManage.php');
?>