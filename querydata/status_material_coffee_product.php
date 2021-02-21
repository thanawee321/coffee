<?php

session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

 $id_mat_coffee = $_POST['id_mat_coffee'];
$status_material_coffee = $_POST['status_material_coffee1'];
$name_mat_coffee = $_POST['name_mat_coffee1'];

$query = "UPDATE coffee.material_coffee SET id_status_mat = $status_material_coffee WHERE id_mat_coffee=$id_mat_coffee";
update($query);


$action ="เปลี่ยนสถานะ";
$message = $name_mat_coffee." เป็น [status] = $status_material_coffee";
$name = $_SESSION['admin_name_login'];

log_des($action,$message,$name);
mysqli_close($connect);
Header('Refresh:0; url=../rawMaterialcoffee.php');
?>