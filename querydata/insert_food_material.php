<?php 

session_start();

require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

$action = "เพิ่มข้อมูล";
$name = $_SESSION['admin_name_login'];


echo $name_mat_food = $_POST['name_mat_food'];
echo $have_mat_food = $_POST['have_mat_food'];
echo $use_mat_food = $_POST['use_mat_food'];
echo $total_mat_food = $_POST['total_mat_food'];
echo $unit_mat_food = $_POST['unit_mat_food'];


$query = "INSERT INTO coffee.material_food(id_mat_food,name_mat_food,have_qty_mat_food,use_qty_mat_food,total_qty_mat_food,unit_mat_food,id_status_mat) VALUES ('','$name_mat_food',$have_mat_food,$use_mat_food,$total_mat_food,'$unit_mat_food',1)";
insert($query);

$message = $name_mat_food;
log_des($action,$message,$name);

//Header('Refresh:0; url=../rawMaterialfood.php');

?>