<?php 
session_start();

require '../connection/connect.php';
require '../checkSession.php';
require '../command.php';

$action = "เพิ่มข้อมูล";
 $name = $_SESSION['admin_name_login'];
 $nameCoffee = count($_POST['name_coffee']);
 $hotPrice = count($_POST['hot_price']);
 $icePrice = count($_POST['ice_price']);
$i=0;
$count = 0;
if($nameCoffee >=1){
for($i;$i<$nameCoffee;$i++){

    $coffee[$i] = $_POST['name_coffee'][$i];
    $hot[$i] = $_POST['hot_price'][$i];
    $ice[$i] = $_POST['ice_price'][$i];
    


    if(trim($_POST['name_coffee'][$i]) !="" && trim($_POST['hot_price'][$i]) !="" && trim($_POST['ice_price'][$i]) !=""){

        $message = $coffee[$i];
       
    $query = "INSERT INTO coffee.product_coffee (id_product,coffee_product,hot_price,ice_price,id_status) VALUES('','$coffee[$i]',$hot[$i],$ice[$i],1)";
    $count+=1;
    insert($query);

    log_des($action,$message,$name);

    }


}

if($count>=1){

echo "<script>alert('เพิ่มข้อมูล $count รายการ สำเร็จ')</script>";
mysqli_close($connect);
Header('Refresh:0; url=../coffeeManage.php');

}else {

    echo "<script>alert('เพิ่มรายการไม่สำเร็จเนื่องจากรายการนั้นน้อยกว่า 1 รายการ');</script>";
    mysqli_close($connect);
    Header('Refresh:0; url=../coffeeManage.php');
}


}

?>