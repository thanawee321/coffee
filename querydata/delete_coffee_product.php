<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';
$action = "ลบข้อมูล";
$name = $_SESSION['admin_name_login'];
echo $id_product = $_REQUEST['id_product'];
echo $name_product = $_REQUEST['name_product'];

$query = "DELETE FROM coffee.product_coffee WHERE id_product=$id_product";
delete($query);
$message = $name_product." ที่อยู่ใน ID : $id_product";
log_des($action,$message,$name);

mysqli_close($connect);
Header('Refresh:0; url=../coffeeManage.php');
?>