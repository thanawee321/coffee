
<?php 
//require 'command.php';
?>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>PERFECT SHOT</h3>
            
        </div>

        <ul class="list-unstyled components">
            <center><a href="admin.php">
                    <p><i class="fas fa-home"></i> หน้าหลัก</p>
                </a></center>
            <li class="active">
                <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="">การจัดการ</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="coffeeManage.php">รายการกาแฟ</a>
                    </li>
                    <li>
                        <a href="foodManage.php">รายการอาหาร</a>
                    </li>
                   
                    <li>
                        <a href="member.php">สมาชิก</a>
                    </li>
                </ul>
            </li>
           
            <li class="active">
                <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="">การจัดการวัตถุดิบ</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                        <a href="rawMaterialcoffee.php">วัตถุดิบกาแฟ</a>
                    </li>
                    <li>
                        <a href="rawMaterialfood.php">วัตถุดิบอาหาร</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>

        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <button style="width:100%" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
            </li>
            <li>
               <center><small><p>Copyright © by LUCIFERADULT V.1.12</p></small></center>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-align-left"></i>

                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link active" href="salecoffee.php"><i class="fas fa-store"></i> ร้านขาย</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item dropdown dropstart">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['admin_name_login'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#log"><i class="fas fa-history"></i> ประวัติรายการ</a></li>
                                <li><a class="dropdown-item" href="highmanage.php"><i class="fas fa-hand-point-right"></i> การจัดการขั้นสูง</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr style="height:2px;border-width:0;color:gray;background-color:gray" class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout" ><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Modal logout-->
        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <center><label><h1><i class="fas fa-sign-out-alt"></i></h1>ต้องการออกจากระบบหรือไม่?</label></center>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <a href="logout.php" class="btn btn-danger">ยืนยัน</a>
                    </div>
                </div>
            </div>
        </div>





        <!-- Modal log-->
<div class="modal fade" id="log" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ประวัติการกระทำ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>การกระทำ</th>
                    <th>รายการ</th>
                    <th>วัน/เวลา</th>
                    <th>ผู้ใช้</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result_product_log)){?>
                <tr>
                    <td><?php echo $row['action_log']; ?></td>
                    <td><?php echo $row['des_log']; ?></td>
                    <td><?php echo $row['date_log']; ?></td>
                    <td><?php echo $row['user_log']; ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>