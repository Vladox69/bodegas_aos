<?php
include("conexion.php");

$nom = $_POST['nombre'];
$producto = $_POST['productoN'];

//recuperacion del is producto
$idPro = " SELECT id FROM producto where nombre='$producto' ";
$resultP = mysqli_query($conn,$idPro);
if( $fila1 = mysqli_fetch_row($resultP) ){
    $product = $fila1[0];
}

$actulizar = "update Producto
              set nombre='$nom'
              where id= '$product' ";

$resultA = mysqli_query($conn,$actulizar);
if( $resultA == false ){
    header("location:http://bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com/bodegas_aos/index.php?action=productos");
    //echo json_encode("no actualizaddo");
}else{
    //echo json_encode("Actualizado");
    header("location:http://bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com/bodegas_aos/index.php?action=productos");
} 

?>