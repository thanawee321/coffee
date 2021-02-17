<?php
session_start();
require 'connection/connect.php';
require 'checkSession.php';
include 'command.php';
//รายการกาแฟ+ชื่อสถานะ
/*SELECT product_coffee.id_product,product_coffee.coffee_product,product_coffee.hot_price,product_coffee.ice_price,status_coffee.status FROM product_coffee 
INNER JOIN status_coffee ON product_coffee.id_status = status_coffee.id_status*/

$query = "SELECT * FROM coffee.product_coffee";
$result = mysqli_query($connect, $query);



?>
<!doctype html>
<html lang="en">

<head>
    <title>หน้าการจัดการ</title>
    <?php include('header.html'); ?>
</head>

<body>

    <?php include('menu/menubar.php'); ?>
    <div class="container">

        <div class="form-group ">
            <div class="row">
                <div class="col">
                    <h1>รายการกาแฟทั้งหมด <i class="fas fa-coffee"></i></h1>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_coffee_product"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered bordered-dark text-center table-striped" id="viewdatacoffee" width="100%">

                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th hidden>ID</th>
                            <th scope="col">เมนูกาแฟ</th>
                            <th scope="col">ร้อน</th>
                            <th scope="col">เย็น</th>

                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                            <th width="5%">สถานะ</th>

                            <!--<button class="btn btn-info"><i class="fas fa-spinner"></i></button>-->

                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 0;
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $i += 1; ?></td>
                                <td hidden><?php echo $row['id_product']; ?></td>
                                <td><?php echo $row['coffee_product']; ?></td>
                                <td><?php echo $row['hot_price']; ?></td>
                                <td><?php echo $row['ice_price']; ?></td>


                                <td><button class="btn btn-warning update_coffee_product"><i class="fas fa-edit"></i></button></td>
                                <td><button class="btn btn-danger delete_coffee_product" data-bs-toggle="modal" data-bs-target="#delete_coffee_product" id="<?php echo $row['id_product']; ?>" id_name="<?php echo $row['coffee_product']; ?>"><i class="fas fa-trash"></i></button></td>
                                <?php if ($row['id_status'] == 1) { ?>
                                    <td><button style="width:100%" class="btn btn-success status" data-bs-toggle="modal" data-bs-target="#status" id="<?php echo $row['id_status']; ?>" id2="<?php echo $row['id_product']; ?>" name="<?php echo $row['coffee_product']; ?>">
                                            <!--<i class="fas fa-mug-hot"></i>--><i class="fas fa-mug-hot"></i>
                                            <p hidden>Online</p>
                                        </button></td>
                                <?php } else if ($row['id_status'] == 2) { ?>
                                    <td><button style="width:100%" class="btn btn-secondary status" data-bs-toggle="modal" data-bs-target="#status" id="<?php echo $row['id_status']; ?>" id2="<?php echo $row['id_product']; ?>" name="<?php echo $row['coffee_product']; ?>">
                                            <!--<i class="fas fa-coffee"></i>--><i class="fas fa-coffee"></i>
                                            <p hidden>Offline</p>
                                        </button></td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>




    </div>
    </div>
    <div class="overlay"></div>

    <!-- Modal insert-->
    <div class="modal fade " id="insert_coffee_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content " style="background-color:#FFF7E8">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มเมนูกาแฟ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="querydata/insert_coffee_product.php">
                        <div class="container">

                            <table class="table" id="dynamic_insert_coffee">
                                <tr>
                                    <th width="50%">ชื่อกาแฟ</th>
                                    <th width="25%">ร้อน/บาท</th>
                                    <th width="25%">เย็น/บาท</th>
                                    <th>มากกว่า1</th>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control" name="name_coffee[]" id="name_coffee[]"></td>
                                    <td><input type="number" class="form-control" name="hot_price[]" id="hot_price[]"></td>
                                    <td><input type="number" class="form-control" name="ice_price[]" id="ice_price[]"></td>
                                    <td><button type="button" style="width:100%" class="btn btn-success" name="add" id="add"><i class="fas fa-plus"></i></button></td>
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




    <!-- Modal edit-->
    <div class="modal fade" id="edit_coffee_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการกาแฟ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="querydata/update_coffee_product.php">
                            <div class="row">
                                <div class="col">
                                    <input hidden type="text" name="id_product_update" id="id_product_update">
                                    <label>ชื่อกาแฟ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control mb-2" name="name_coffee_update" id="name_coffee_update">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>ร้อน/บาท</label>
                                </div>
                                <div class="col">
                                    <label>เย็น/บาท</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control mb-2" name="hot_price_update" id="hot_price_update">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control mb-2" name="ice_price_update" id="ice_price_update">
                                </div>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> แก้ไข</button>
                </div>
            </div>
            </form>
        </div>
    </div>





    <!-- Modal delete-->
    <div class="modal fade" id="delete_coffee_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger cfdelete_coffee_product">ตกลง</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal status-->
    <div class="modal fade " id="status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนสถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="querydata/status_coffee_product.php">
                        <input hidden type="text" name="product_id" id="product_id">
                        <input hidden type="text" name="name_product" id="name_product">
                        <select class="form-control" name="status_product" id="status_product">
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary" data-bs-dismiss="modal" value="ยกเลิก">
                    <input type="submit" class="btn btn-primary" value="ตกลง">
                </div>
            </div>
            </form>
        </div>
    </div>


</body>
<?php include('footer.html'); ?>

</html>