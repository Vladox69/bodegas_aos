<?php
$servername="bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com";
$username="umyq6rfhdrdgbcom";
$password="MQrORY1LgWcC5s9V8im4";
$dbname="bbo4bxid24vtckefdtix";
$conn= mysqli_connect($servername,$username,$password,$dbname);
$mysqli = new mysqli($servername,$username,$password,$dbname);
if(!$mysqli)
{
    die("Error en la conexion".mysqli_connect_error());
}
function utf8_converter($array)
{
    array_walk_recursive($array, function($item) {
        $item =utf8_encode($item);
    });
    return json_encode($array);
}


?>
