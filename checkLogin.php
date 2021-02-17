<?php
session_start();
require 'connection/connect.php';
require 'command.php';

$username = $_POST['username'];
$password = $_POST['password'];
$action ="เข้าสู่ระบบ";
$message = "ทำการเข้าสู่ระบบ";

if(isset($_POST['btn_login']) && $username && $password){

    $query = "SELECT * FROM coffee.login WHERE id_login='$username' AND password_login='$password'";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result)==1){

        $row = mysqli_fetch_array($result);

        $userid = $row['id'];
        $name_login = $row['name_login'];
        $status = $row['status_login'];

        
        switch($status){

            case "admin":
                $_SESSION['admin_name_login'] = $name_login;
                log_des($action,$message,$name_login);
                Header('Location: admin.php');
                break;
            case "user":
                $_SESSION['user_name_login'] = $name_login;
                log_des($action,$message,$name_login);
                Header('Location: user.php');
                break;
            default:
                echo "<script>alert('กรุณารอการยืนยันสถานะจาก Admin');</script>";
                Header('Refresh:0; url=index.php');
                break;
        }


    }else {
        echo "<script>alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง')</script>";
        echo "<script>window.history.back();</script>";
    }


}else {


    Header('Location: index.php');

}










/*if (isset($_POST['btn_login']) && $username && $password) {




    try {

        $select_stmt = $connect->prepare("SELECT * FROM coffee.login WHERE id_login=:p_username AND password_login=:p_password");
        $select_stmt->bindParam(":p_username", $username);
        $select_stmt->bindParam(":p_password", $password);
        $select_stmt->execute();

        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

            ///เอา id และ password ออกมาเพื่อเอาไป check
            $dbid_login = $row['id_login'];
            $dbid_password = $row['password_login'];

            ////////////เอาชื่อของผู้ใช้งานกับ status ออกมาเพื่อเอาไปใช้งาน //////////
            $dbname_login = $row['name_login'];
            $dbstatus_login = $row['status_login'];
        }

        if ($select_stmt->rowCount() > 0) {



            if (($username == $dbid_login) && ($password == $dbid_password)) { //// id และ password ที่ดึงออกมาเอามา check ตรงนี้



                switch ($dbstatus_login) {//เงื่อนไขว่ามี status นี้
                    case 'admin':
                        $_SESSION['username_admin'] =  $dbname_login;
                        $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                        Header('Location: admin.php');
                        break;
                    case 'user':
                        $_SESSION['username_user'] = $dbname_login;
                        $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                        Header('Location: user.php');
                        break;
                    default:
                        echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
                        Header('Location: index.php');
                        break;
                }
            } else {


                echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
                        Header('Location: index.php');


            }


        } else {

            echo "<script>alert('ชื่อหรือรหัสผ่านไม่ถูกต้อง');</script>";
            Header('Refresh:0; url=index.php');

        }
    } catch (PDOException $e) {

        $e->getMessage();
    }
} else {
    echo "<script>alert('ชื่อหรือรหัสผ่านไม่ถูกต้อง');</script>";
    Header('Location: index.php');
}*/


?>