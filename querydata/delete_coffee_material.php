<?php 

session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';


$action = "ลบข้อมูล";
$name = $_SESSION['admin_name_login'];

$id_mat_coffee = $_REQUEST['id_mat_coffee'];
$name_mat_coffee = $_REQUEST['name_mat_coffee'];

$query = "DELETE FROM coffee.material_coffee WHERE id_mat_coffee=$id_mat_coffee";
delete($query);
$message = $name_mat_coffee." ที่อยู่ใน ID : $id_mat_coffee";
log_des($action,$message,$name);


mysqli_close($connect);
Header('Refresh:0; url=../rawMaterialcoffee.php');

?>