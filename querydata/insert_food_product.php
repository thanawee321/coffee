<?php
session_start();
require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';


$num = count($_POST['name_food']);
$action = "เพิ่มข้อมูล";
$name = $_SESSION['admin_name_login'];
if ($num >= 1) {

    $i = 0;
    $count = 0;
    for ($i; $i < $num; $i++) {

        $name_food[$i] = $_POST['name_food'][$i];
        $price_food[$i] = $_POST['price_food'][$i];

        if (trim($_POST['name_food'][$i]) != "" && trim($_POST['price_food'][$i]) != "") {

            $message = $name_food[$i];
            $query = "INSERT INTO coffee.product_food (id_product_food,food_product,food_price,id_status) VALUES('','$name_food[$i]',$price_food[$i],1)";
            $count += 1;
            insert($query);

            log_des($action,$message,$name);
        }
    }

    if ($count >= 1) {

        echo "<script>alert('เพิ่มข้อมูล $count รายการ สำเร็จ')</script>";
        mysqli_close($connect);
        Header('Refresh:0; url=../foodManage.php');
    } else {
        echo "<script>alert('เพิ่มรายการไม่สำเร็จเนื่องจากรายการนั้นน้อยกว่า 1 รายการ');</script>";
        mysqli_close($connect);
        Header('Refresh:0; url=../foodManage.php');
    }
}
