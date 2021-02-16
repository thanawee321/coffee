<?php 
require 'connect.php';
require 'command.php';

$query = "INSERT INTO (id_product,coffee_product,hot_price,ice_price,id_status) VALUES('','เอสเปรสโส',50,55)";

insert($query);


?>