<?php
session_start();
require 'connection/connect.php';
require 'checkSession.php';
include 'command.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>หน้าการจัดการ</title>
    <?php include('header.html'); ?>
</head>

<body>
    <?php include('menu/menubar.php'); ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-6">

                <h3>เมนูกาแฟ</h3>
                <table class="table table-bordered text-center" id="viewCoffeeProduct">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ชื่อเมนูกาแฟ</th>
                            <th scope="col">ร้อน</th>
                            <th scope="col">เย็น</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row1 = mysqli_fetch_array($result_product_coffee)) { ?>
                            <tr>

                                <td><?php echo $row1['id_product']; ?></td>
                                <td><?php echo $row1['coffee_product']; ?></td>
                                <td><?php echo $row1['hot_price']; ?></td>
                                <td><?php echo $row1['ice_price']; ?></td>
                                <?php if ($row1['status'] == "Online") { ?>
                                    <td><button style="width:90%" class="btn btn-success"><?php echo $row1['status']; ?></button></td>
                                <?php } else if ($row1['status'] == "Offline") { ?>
                                    <td><button style="width:90%" class="btn btn-danger"><?php echo $row1['status']; ?></button></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
            <div class="col">

                <h3>เมนูอาหาร</h3>
                <table class="table table-bordered text-center" id="viewProductFood">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ชื่อรายการอาหาร</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row2 = mysqli_fetch_array($result_product_food)) { ?>
                            <tr>

                                <td><?php echo $row2['id_product_food']; ?></td>
                                <td><?php echo $row2['food_product']; ?></td>
                                <td><?php echo $row2['food_price']; ?></td>
                                <?php if ($row2['status'] == "Online") { ?>
                                    <td><button style="width:90%" class="btn btn-success"><?php echo $row2['status']; ?></button></td>
                                <?php } else if ($row2['status'] == "Offline") { ?>
                                    <td><button style="width:90%" class="btn btn-success"><?php echo $row2['status']; ?></button></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-6">

                <h3>วัตถุดิบกาแฟ</h3>
                <table class="table table-bordered text-center" id="viewMaterialcoffee">
                    <thead class="table-warning">
                        <tr>
                            <!--<th scope="col">#</th>-->
                            <th scope="col">ชื่อวัตุดิบ</th>
                            <th scope="col">มี</th>
                            <th scope="col">ใช้</th>
                            <th scope="col">เหลือ</th>
                            <th scope="col">หน่วย</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row3 = mysqli_fetch_array($result_material_coffee)) { ?>
                            <tr>

                                <!--<td><?php echo $row3['id_mat_coffee']; ?></td>-->
                                <td><?php echo $row3['name_mat_coffee']; ?></td>
                                <td><?php echo $row3['have_qty_mat_coffee']; ?></td>
                                <td><?php echo $row3['use_qty_mat_coffee']; ?></td>
                                <?php if ($row3['total_qty_mat_coffee'] == 0) { ?></td>
                                    <td style="color:red">
                                        <?php echo $row3['total_qty_mat_coffee']; ?>
                                    </td>
                                <?php } else { ?>
                                    <td><?php echo $row3['total_qty_mat_coffee']; ?></td>
                                <?php } ?>
                                <td><?php echo $row3['unit_mat_coffee']; ?></td>
                                <?php if ($row3['status_mat'] == "มีของ") { ?>
                                    <td><button style="width:90%" class="btn btn-success"><?php echo $row3['status_mat']; ?></button></td>
                                <?php } else if ($row3['status_mat'] == "หมด") { ?>
                                    <td><button style="width:90%" class="btn btn-danger"><?php echo $row3['status_mat']; ?></button></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">

                <h3>วัตถุดิบอาหาร</h3>
                <table class="table " id="viewMaterialfood">
                    <thead class="table-primary" >
                        <tr>

                            <th scope="col">ชื่อวัตุดิบ</th>
                            <th scope="col">มี</th>
                            <th scope="col">ใช้</th>
                            <th scope="col">เหลือ</th>
                            <th scope="col">หน่วย</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row4 = mysqli_fetch_array($result_material_food)) { ?>
                            <tr>

                                <td><?php echo $row4['name_mat_food']; ?></td>
                                <td><?php echo $row4['have_qty_mat_food']; ?></td>
                                <td><?php echo $row4['use_qty_mat_food']; ?></td>
                                <?php if($row4['total_qty_mat_food']==0) {?>
                                <td style="color:red"><?php echo $row4['total_qty_mat_food']; ?></td>
                                <?php } else { ?>
                                <td><?php echo $row4['total_qty_mat_food']; ?></td>
                                <?php } ?>

                                <td><?php echo $row4['unit_mat_food'];?></td>

                                <?php if ($row4['status_mat'] == "มีของ") { ?>
                                    <td><button style="width:90%" class="btn btn-success"><?php echo $row4['status_mat']; ?></button></td>
                                <?php } else if ($row4['status_mat'] == "หมด") { ?>
                                    <td><button style="width:90%" class="btn btn-danger"><?php echo $row4['status_mat']; ?></button></td>
                                <?php } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>







    </div>




</body>
<?php include('footer.html'); ?>

</html>