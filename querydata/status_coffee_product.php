<?php 
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';


$id_product = $_POST['product_id'];
$id_status = $_POST['status_product'];
$name_product = $_POST['name_product'];

$action ="เปลี่ยนสถานะ";
$message = $name_product." เป็น [status] = $id_status";
$name = $_SESSION['admin_name_login'];
$query = "UPDATE coffee.product_coffee SET id_status = $id_status WHERE id_product=$id_product";
update($query);

log_des($action,$message,$name);
mysqli_close($connect);
Header('Refresh:0; url=../coffeeManage.php');
?>