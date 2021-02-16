<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <h3>PERFECT SHOT</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active ">
                    <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="">Home</a>
                    <ul class="collapse list-unstyled " id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li class="active">
                    <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
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
                    <button style="width:100%" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
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

                    <button type="button" id="sidebarCollapse" class="btn ">
                        <i class="fas fa-align-left"></i>
                        
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>



    






            <!-- Modal login-->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบร้านกาแฟ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-12">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="checkLogin.php" method="POST">
                            
                            <div class="form-group">
                                <label for="username" class="mb-1">ชื่อผู้ใช้งาน</label><br>
                                <input type="text" name="username" id="username" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label for="password" class="mb-1">รหัสผ่าน</label><br>
                                <input type="password" name="password" id="password" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <input type="checkBox" class="mb-2" onclick="showpass();">
                                <label>แสดงรหัสผ่าน</label>
                            </div>

                            <div class="form-group">
                            <a href="#"><u>ลืมรหัสผ่าน</u></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <input type="reset" class="btn btn-secondary" value="ยกเลิก">
        <input type="submit" class="btn btn-primary" name = "btn_login" id="btn_login" value="ตกลง">
      </div>

    </div>
    </form>
  </div>
</div>