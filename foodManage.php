<?php
session_start();
require 'connection/connect.php';
require 'checkSession.php';
/*SELECT product_food.id_product_food,product_food.food_product,product_food.food_price,status_coffee.status FROM product_food INNER JOIN status_coffee ON product_food.id_status = status_coffee.id_status*/
$query = "SELECT * FROM coffee.product_food";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>หน้าจัดการอาหาร</title>
    <?php include('header.html'); ?>
</head>

<body>
    <?php include('menu/menubar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>รายการอาหารทั้งหมด <i class="fas fa-utensils"></i></h1>
            </div>
        </div>
        <div class="row ">
            <div class="col">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_food_product"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered bordered-dark text-center table-striped" id="viewFood">
                    <thead class="table-dark">
                        <tr>

                            <th width="5%">ลำดับ</th>
                            <th hidden>ID</th>
                            <th scope="">ชื่อรายการอาหาร</th>
                            <th scope="">ราคา</th>
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                            <th width="10%">สถานะ</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0;
                        while ($row = mysqli_fetch_array($result)) { ?>

                            <tr>
                                <td><?php echo $i += 1 ?></td>
                                <td hidden><?php echo $row['id_product_food']; ?></td>
                                <td><?php echo $row['food_product']; ?></td>
                                <td><?php echo $row['food_price']; ?></td>

                                <td><button class="btn btn-warning update_food_product"><i class="fas fa-edit"></i></button></td>
                                <td><button class="btn btn-danger delete_food_product" data-bs-toggle="modal" data-bs-target="#delete_food_product" id="<?php echo $row['id_product_food']; ?>" name_food="<?php echo $row['food_product']; ?>"><i class="fas fa-trash"></i></button></td>

                                <?php if ($row['id_status'] == 1) { ?>
                                    <td><button style="width:100%" class="btn btn-success status_food" data-bs-toggle="modal" data-bs-target="#status_food1" id_food="<?php echo $row['id_product_food']; ?>" id="<?php echo $row['id_status']; ?>">
                                            <i class="fas fa-mug-hot"></i>
                                            <p hidden>มีของ</p>
                                        </button></td>
                                <?php } else if ($row['id_status'] == 2) { ?>
                                    <td><button style="width:100%" class="btn btn-secondary status_food" data-bs-toggle="modal" data-bs-target="#status_food1" id_food="<?php echo $row['id_product_food']; ?>" id="<?php echo $row['id_status']; ?>">
                                            <i class="fas fa-coffee"></i>
                                            <p hidden>หมดแล้ว</p>
                                        </button></td>

                                <?php } ?>


                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>






    <!-- Modal insert food-->
    <div class="modal fade" id="insert_food_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="container">
                        <form method="POST" action="querydata/insert_food_product.php">
                            <table class="table" id="dynamic_insert_food">
                                <tr>
                                    <th>ชื่ออาหาร</th>
                                    <th>ราคา</th>
                                    <th>มากกว่า1</th>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control" name="name_food[]" id="name_food[]"></td>
                                    <td><input type="number" class="form-control" name="price_food[]" id="price_food[]"></td>
                                    <td><button type="button" style="width:100%" class="btn btn-success" name="add2" id="add2"><i class="fas fa-plus"></i></button></td>
                                </tr>

                            </table>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> ตกลง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    update_food_product

    <!-- Modal edit food-->
    <div class="modal fade" id="edit_food_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <form method="POST" action="querydata/update_food_product.php">
                            <div class="row">
                                <div class="col">
                                    <input hidden type="text" name="id_product_food" id="id_product_food">
                                    <label>ชื่อกาแฟ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control mb-2" name="name_food" id="name_food">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>ราคา/บาท</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control mb-2" name="food_price" id="food_price">
                                </div>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> ตกลง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal delete food-->
    <div class="modal fade" id="delete_food_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การยืนยัน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <center><label>
                                        <h1><i class="fas fa-exclamation-triangle"></i></h1> ต้องการลบหรือไม่?
                                    </label></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger cfdelete_food_product">ตกลง</button>
                </div>
            </div>
        </div>
    </div>






    <!-- Modal status food-->
    <div class="modal fade" id="status_food1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="querydata/status_food_product.php">
                        <input hidden type="text" name="id_food" id="id_food">
                        <select class="form-control" name="status_product_food" id="status_product_food">
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
            </div>
            </form>
        </div>
    </div>


</body>
<?php include('footer.html'); ?>

</html>