<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "coffee";


$connect = mysqli_connect($host,$user,$password,$database)or die(mysqli_error($connect));






/*
try{

$connect = new PDO("mysql:host={$host};dbname={$database}",$user,$password);
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){

$e->getMessage();


}*/
?>