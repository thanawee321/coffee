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
                <table class="table" id="viewMaterialfood">
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
                                <td hidden><?php echo $row['id_mat_food']; ?></td>
                                <td><?php echo $row['name_mat_food']; ?></td>
                                <td><?php echo $row['have_qty_mat_food']; ?></td>
                                <td><?php echo $row['use_qty_mat_food']; ?></td>
                                <td><?php echo $row['total_qty_mat_food']; ?></td>
                                <td><?php echo $row['unit_mat_food']; ?></td>

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



    <!-- Modal insert food material-->
    <div class="modal fade" id="insert_food_material" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการวัตถุดิบอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="querydata/insert_food_material.php">

                            <div class="row">
                                <div class="col-4">
                                    <label>ชื่อวัตถุดิบอาหาร</label>
                                </div>
                            </div>
                            <div class="was-validated">
                                <div class="row">
                                    <div class="col">
                                        <input type="text " class="form-control mb-2" name="name_mat_food" required>
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
                                    <input type="number" class="form-control mb-2" name="have_mat_food" id="have_mat_food" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="use_mat_food" id="use_mat_food" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control mb-2" name="total_mat_food" id="total_mat_food" readonly>
                                </div>
                                <div class="col-3">
                                    <select class="form-control " name="unit_mat_food" id="unit_mat_food">
                                        <option>อัน</option>
                                        <option>ชิ้น</option>
                                        <option>ถุง</option>
                                        <option>กิโลกรัม</option>
                                    </select>
                                </div>
                            </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
            </div>
            </form>
        </div>
    </div>



</body>
<?php include('footer.html'); ?>

</html>