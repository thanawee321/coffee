<?php 

session_start();

require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

$action = "เพิ่มข้อมูล";
$name = $_SESSION['admin_name_login'];


echo $name_mat_coffee = $_POST['name_mat_coffee'];
echo $have_mat_coffee = $_POST['have_mat_coffee'];
echo $use_mat_coffee = $_POST['use_mat_coffee'];
echo $total_mat_coffee = $_POST['total_mat_coffee'];
echo $unit_mat_coffee = $_POST['unit_mat_coffee'];

$query = "INSERT INTO coffee.material_coffee(id_mat_coffee,name_mat_coffee,have_qty_mat_coffee,use_qty_mat_coffee,total_qty_mat_coffee,unit_mat_coffee,id_status_mat) VALUES ('','$name_mat_coffee',$have_mat_coffee,$use_mat_coffee,$total_mat_coffee,'$unit_mat_coffee',1)";
insert($query);

$message = $name_mat_coffee;
log_des($action,$message,$name);

Header('Refresh:0; url=../rawMaterialcoffee.php');

?>