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

                                <td><button class="btn btn-warning edit_material_coffee"><i class="fas fa-edit"></i></button></td>
                                <td><button class="btn btn-danger delete_material_coffee_product" data-bs-toggle="modal" data-bs-target="#delete_material_coffee_product" id="<?php echo $row['id_mat_coffee'];?>" name="<?php echo $row['name_mat_coffee']; ?>"><i class="fas fa-trash"></i></button></td>


                                <?php if ($row['id_status_mat'] == 1) { ?>
                                    <td><button class="btn btn-success status_mat_coffee" id="<?php echo $row['id_status_mat']; ?>" id_coffee = "<?php echo $row['id_mat_coffee']; ?>" name="<?php echo $row['name_mat_coffee']; ?>" data-bs-toggle="modal" data-bs-target="#status_material_coffee">
                                            <p hidden>มีของ</p><i class="fas fa-mug-hot"></i>
                                        </button></td>
                                <?php } else if ($row['id_status_mat'] == 2) { ?>
                                    <td><button class="btn btn-secondary status_mat_coffee" id="<?php echo $row['id_status_mat']; ?>" id_coffee = "<?php echo $row['id_mat_coffee']; ?>"name="<?php echo $row['name_mat_coffee']; ?>" data-bs-toggle="modal" data-bs-target="#status_material_coffee">
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
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการวัตถุดิบกาแฟ</h5>
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
                                        <input type="text " class="form-control mb-2" name="name_mat_coffee" required>
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
                                    <input type="number" class="form-control mb-2" name="have_mat_coffee" id="have_mat_coffee" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="use_mat_coffee" id="use_mat_coffee" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="total_mat_coffee" id="total_mat_coffee" readonly required>
                                </div>
                                <div class="col-3">
                                    <select class="form-control " name="unit_mat_coffee" id="unit_mat_coffee" required>
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



    <!-- Modal edit material coffee-->
    <div class="modal fade" id="edit_material_coffee_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขวัตถุดิบกาแฟ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <form method="POST" action="querydata/update_coffee_material.php">

                            <div class="row">
                                <div class="col-4">
                                    <label>ชื่อวัตถุดิบกาแฟ</label>
                                </div>
                            </div>
                            <div class="was-validated">
                                <div class="row">
                                    <div class="col">
                                        <input hidden type="text" name="id_mat" id="id_mat">
                                        <input type="text " class="form-control mb-2" name="edit_name_mat_coffee" id="edit_name_mat_coffee" required>
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
                                    <input type="number" class="form-control mb-2" name="edit_have_mat_coffee" id="edit_have_mat_coffee" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="edit_use_mat_coffee" id="edit_use_mat_coffee" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="edit_total_mat_coffee" id="edit_total_mat_coffee" readonly required>
                                </div>
                                <div class="col-3">
                                    <select class="form-control " name="edit_unit_mat_coffee" id="edit_unit_mat_coffee" required>
                                        <option value="ขวด">ขวด</option>
                                        <option value="กระป๋อง">กระป๋อง</option>
                                        <option value="อัน">อัน</option>
                                        <option value="ชิ้น">ชิ้น</option>
                                        <option value="ห่อ">ห่อ</option>
                                        <option value="แพ็ค">แพ็ค</option>
                                        <option value="ถุง">ถุง</option>
                                        <option value="กิโลกรัม">กิโลกรัม</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>ตกลง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal delete material coffee-->
    <div class="modal fade" id="delete_material_coffee_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger cfdelete_material_coffee_product">ตกลง</button>
                </div>
            </div>
        </div>
    </div>






    <!-- Modal status material coffee-->
    <div class="modal fade" id="status_material_coffee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="querydata/status_material_coffee_product.php">
                        <input hidden type="text" name="id_mat_coffee" id="id_mat_coffee">
                        <input type="text" name="name_mat_coffee1" id="name_mat_coffee1">
                        <select class="form-control" name="status_material_coffee1" id="status_material_coffee1">
                            <option value="1">มีของ</option>
                            <option value="2">หมด</option>
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