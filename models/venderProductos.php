<?php
include("conexion.php");

$cant = $_POST['cantidad'];
$producto = $_POST['productos'];
$ciudad = $_POST['bodegas'];

//recuperacion del id producto
$idPro = " SELECT id FROM producto where nombre='$producto' ";
$resultP = mysqli_query($conn,$idPro);
if( $fila1 = mysqli_fetch_row($resultP) ){
    $product = $fila1[0];
}

//Recuperacion id bodega
$idCiu = " SELECT id FROM bodega where ciudad='$ciudad' ";
$resultB = mysqli_query($conn,$idCiu);
if( $fila2 = mysqli_fetch_row($resultB) ){
    $city = $fila2[0];
}

//actualizar
$dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$city' and idprod = '$product' ";
    $resultado = mysqli_query($conn,$dql);
    if( $fila3 = mysqli_fetch_row($resultado) ){
        $old_cant = $fila3[0];
    }

$new_cant = ($cant-$old_cant) * (-1) ;    

$actulizar = "update detalle_bodega
            set cantidad = '$new_cant'
            where idbod = '$city'
            and idprod = '$product' ";

$resultA = mysqli_query($conn,$actulizar);
if( $resultA == false ){
    header("location:http://localhost/bodegas_aos/index.php?action=sucursales");
    //echo json_encode("no actualizaddo");
}else{
    //echo json_encode("Actualizado");
    header("location:http://localhost/bodegas_aos/index.php?action=sucursales");
}   
?>