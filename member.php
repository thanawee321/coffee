<?php
session_start();
require 'connection/connect.php';
require 'command.php';
?>

<!DOCTYPE html>

<html>

<head>
    <?php include('header.html'); ?>

</head>

<body>
    <?php ?>
    <?php include('menu/menubar.php'); ?>


    <div class="container">

        <div class="form-group ">
            <div class="row">
                <div class="col">
                    <h1>สมาชิกทั้งหมด <i class="fas fa-user-circle"></i></h1>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_member"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered bordered-dark text-center table-striped" id="viewdatacoffee">

                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>

                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">เบอร์โทร</th>
                            <th width="5%">แต้ม</th>
                            <th width="5%">สถานะ</th>

                            <!--<button class="btn btn-info"><i class="fas fa-spinner"></i></button>-->

                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 0;
                        while ($row = mysqli_fetch_array($result_member)) { ?>
                            <tr>
                                <td><?php echo $row['id_member']; ?></td>
                                <td><?php echo $row['name_member']; ?></td>
                                <td><?php echo $row['sur_member']; ?></td>
                                <td><?php echo $row['phone_member']; ?></td>
                                <td><?php echo $row['point_member']; ?></td>
                                <td><?php echo $row['status_member']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>



    </div>



    <!-- Modal insert member-->
    <div class="modal fade" id="insert_member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="container">
                        <form method="POST" action="#">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-6">
                                    <div id="login-box" class="col-md-12">

                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control mb-2" name="name" id="name">
                                        <label>นามสกุล</label>
                                        <input type="text" class="form-control mb-2" name="sur" id="sur">
                                        <label>เบอร์โทร</label>
                                        <input type="number" class="form-control mb-2" name="phone" id="phone">

                                    </div>
                                </div>
                            </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> ตกลง</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php include('footer.html'); ?>
</body>

</html>