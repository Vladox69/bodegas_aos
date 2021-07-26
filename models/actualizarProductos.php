<?php
include("conexion.php");

$cant = $_POST['cantidad'];
$producto = $_POST['productos'];
$ciudad = $_POST['ciudad'];


//actualizar
$dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$ciudad' and idprod = '$producto' ";
    $resultado = mysqli_query($conn,$dql);
    if( $fila3 = mysqli_fetch_row($resultado) ){
        $old_cant = $fila3[0];
    }

$new_cant = $cant + $old_cant; 

if( $old_cant == 0){
    $actulizar = "update detalle_bodega
                set cantidad = '$new_cant',
                    estado = 'S'
                where idbod = '$ciudad'
                and idprod = '$producto' ";
}else{
    $actulizar = "update detalle_bodega
                set cantidad = '$new_cant'
                where idbod = '$ciudad'
                and idprod = '$producto' ";
}

$resultA = mysqli_query($conn,$actulizar);
header("location:https://aosgrupouno.cleverapps.io/index.php?action=productos");   
?>