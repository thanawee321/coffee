<?php
session_start();
require 'connection/connect.php';
require 'checkSession.php';
require 'command.php';

$query = "SELECT * FROM coffee.material_coffee";
$result = mysqli_query($connect, $query);


?>
<!DOCTYPE html>
<html>

<head>
    <title>วัตถุดิบกาแฟ</title>
    <?php include('header.html'); ?>
</head>

<body>
    <?php include('menu/menubar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>รายการวัตถุดิบกาแฟ <i class="fas fa-sliders-h"></i></h1>
            </div>
        </div>
        <div class="row ">
            <div class="col">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_coffee_material"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered bordered-dark text-center table-striped" id="viewmaterialCoffee">
                    <thead class="table-dark">
                        <tr>

                            <th width="5%">ลำดับ</th>
                            <th hidden>ID</th>
                            <th>รายการวัตถุดิบกาแฟ</th>
                            <th scope="">เหลือ</th>
                            <th scope="">ใช้ไป</th>
                            <th width="5%">ทั้งหมด</th>
                            <th width="5%">หน่วย</th>
                            <th width="">แก้ไข</th>
                            <th>ลบ</th>
                            <th width="">สถานะ</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0;
                        while ($row = mysqli_fetch_array($result)) { ?>

                            <tr>

                                <td><?php echo $i += 1 ?></td>
                                <td hidden><?php echo $row['id_mat_coffee']; ?></td>
                                <td><?php echo $row['name_mat_coffee']; ?></td>
                                <td><?php echo $row['have_qty_mat_coffee']; ?></td>
                                <td><?php echo $row['use_qty_mat_coffee']; ?></td>
                                <td><?php echo $row['total_qty_mat_coffee']; ?></td>
                                <td><?php echo $row['unit_mat_coffee']; ?></td>

                                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                                <td><button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>


                                <?php if ($row['id_status_mat'] == 1) { ?>
                                    <td><button class="btn btn-success" id="<?php echo $row['id_status_mat']; ?>">
                                            <p hidden>มีของ</p><i class="fas fa-mug-hot"></i>
                                        </button></td>
                                <?php } else if ($row['id_status_mat'] == 2) { ?>
                                    <td><button class="btn btn-secondary" id="<?php echo $row['id_status_mat']; ?>">
                                            <p hidden>หมด</p><i class="fas fa-coffee"></i>
                                        </button></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>






    <!-- Modal insert coffee material-->
    <div class="modal fade" id="insert_coffee_material" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="container">
                        <form method="POST" action="querydata/insert_coffee_material.php">

                            <div class="row">
                                <div class="col-4">
                                    <label>ชื่อวัตถุดิบกาแฟ</label>
                                </div>
                            </div>
                            <div class="was-validated">
                                <div class="row">
                                    <div class="col">
                                        <input type="text is-invalid" class="form-control mb-2" name="name_mat_coffee" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูล
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label>มีเหลืออยู่</label>
                                </div>
                                <div class="col-3">
                                    <label>ใช้ไปแล้ว</label>
                                </div>
                                <div class="col-3">
                                    <label>รวมทั้งหมด</label>
                                </div>
                                <div class="col-3">
                                    <label>หน่วย</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="have_mat_coffee" id="have_mat_coffee">
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="use_mat_coffee" id="use_mat_coffee">
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="total_mat_coffee" id="total_mat_coffee" disabled>
                                </div>
                                <div class="col-3">
                                    <select class="form-control " name="unit_mat_coffee" id="unit_mat_coffee">
                                        <option>ขวด</option>
                                        <option>อัน</option>
                                        <option>ชิ้น</option>
                                        <option>ห่อ</option>
                                        <option>แพ็ค</option>
                                        <option>ถุง</option>
                                        <option>กิโลกรัม</option>
                                    </select>
                                </div>
                            </div>



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
                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> dwawdawdwdตกลง</button>
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
                    <button type="button" class="btn btn-primary cfdelete_food_product">ตกลง</button>
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