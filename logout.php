<?php 
session_start();
require 'command.php';
$action = "ออกจากระบบ";
$message = "ทำการออกจากระบบ";
$name = $_SESSION['admin_name_login'];
log_des($action,$message,$name);
session_destroy();

Header('Location: index.php');

?>