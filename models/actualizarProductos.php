<?php
include("conexion.php");

$cant = $_POST['cantidad'];
$producto = $_POST['producto'];
$ciudad = $_POST['ciudad'];


//recuperacion del is producto
$idPro = " SELECT id FROM producto where nombre='$producto' ";
$resultP = mysqli_query($conn,$idPro);
if( $fila1 = mysqli_fetch_row($resultP) ){
    $product = $fila1[0];
}

//Recuperacion id bodega
$idCiu = " SELECT id FROM bodega where ciudad='$ciudad' ";
$resultB = mysqli_query($conn,$idPro);
if( $fila2 = mysqli_fetch_row($resultB) ){
    $city = $fila2[0];
}

$actulizar = "update detalle_bodega
            set cantidad = '$cant'
            where idbod = '$city'
            and idprod = '$product' ";
$resultA = mysqli_query($conn,$actulizar);
if( $resultA == false ){
    header("location:http://localhost/bodegas_aos/models/administrador.php");
    //echo json_encode("no actualizaddo");
}else{
    //echo json_encode("Actualizado");
    header("location:http://localhost/bodegas_aos/models/administrador.php");
}   
?>