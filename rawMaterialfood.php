<?php
session_start();
require 'connection/connect.php';
require 'checkSession.php';
require 'command.php';

$query = "SELECT * FROM coffee.material_food";
$result = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html>

<head>
    <title>วัตถุดิบอาหาร</title>
    <?php include('header.html'); ?>
</head>

<body>
    <?php include('menu/menubar.php'); ?>

    <div class="container">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <h1>วัตถุดิบอาหาร</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_food_material"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
        
            </div>
        </div>


    </div>



</body>
<?php include('footer.html'); ?>

</html>