<?php

require 'connection/connect.php';

//ดูข้อมูลรายการกาแฟ
$query_product_coffee = "SELECT product_coffee.id_product,product_coffee.coffee_product,product_coffee.hot_price,product_coffee.ice_price,status_coffee.status FROM product_coffee 
    INNER JOIN status_coffee ON product_coffee.id_status = status_coffee.id_status";
$result_product_coffee = mysqli_query($connect, $query_product_coffee);

//ดูข้อมูลรายการอาหาร
$query_product_food = "SELECT product_food.id_product_food,product_food.food_product,product_food.food_price,status_coffee.status FROM product_food INNER JOIN status_coffee ON product_food.id_status = status_coffee.id_status";
$result_product_food = mysqli_query($connect, $query_product_food);


//ดูข้อมูลวัตถุดิบกาแฟ
$query_material_coffee = "SELECT material_coffee.id_mat_coffee,material_coffee.name_mat_coffee,material_coffee.have_qty_mat_coffee,material_coffee.use_qty_mat_coffee,material_coffee.total_qty_mat_coffee,material_coffee.unit_mat_coffee,status_material.status_mat FROM material_coffee INNER JOIN status_material ON material_coffee.id_status_mat  = status_material.id_status_mat";
$result_material_coffee = mysqli_query($connect,$query_material_coffee);


//ดูข้อมูลวัตถุดิบอาหาร
$query_material_food = "SELECT material_food.id_mat_food,material_food.name_mat_food,material_food.have_qty_mat_food,material_food.use_qty_mat_food,material_food.total_qty_mat_food,material_food.unit_mat_food,status_material.status_mat FROM material_food INNER JOIN status_material ON material_food.id_status_mat = status_material.id_status_mat";
$result_material_food = mysqli_query($connect,$query_material_food);

//log
$query_product_log = "SELECT * FROM log ORDER BY id_log DESC LIMIT 7";
$result_product_log = mysqli_query($connect,$query_product_log);

$query_member = "SELECT * FROM coffee.member";
$result_member = mysqli_query($connect, $query_member);



function insert($sql)
{

    require 'connection/connect.php';

    $query = $sql;
    $result = mysqli_query($connect, $query);


    if ($result == false) {
        echo "ERROR insert";
    }
}

function delete($sql)
{

    require 'connection/connect.php';
    $query = $sql;
    $result = mysqli_query($connect, $query);

    if ($result == false) {

        echo "ERROR DELETE";
    }
}

function update($sql)
{

    require 'connection/connect.php';
    $query = $sql;
    $result = mysqli_query($connect, $query);

    if ($result == false) {

        echo "ERROR UPDATE".mysqli_error($connect);
    } else {

        echo "<script>alert('อัพเดทข้อมูลสำเร็จ')</script>";
    }
}

function log_des($action, $message,$name)
{
    require 'connection/connect.php';
    date_default_timezone_set("Asia/Bangkok");
    $today = date('Y-m-d H:i:s');

    $query = "INSERT INTO coffee.log(id_log,action_log,des_log,date_log,user_log) VALUES ('','$action','$message','$today','$name')";
    $result = mysqli_query($connect, $query);

    if ($result == false) {

        echo "ERROR LOG";
    }
}

?>
