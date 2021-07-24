
<?php
include("conexion.php");

if(){
    $cant = $_POST['cantidad'];
$ciudad = $_POST['bodegas'];
$producto = $_POST['productos'];

//actualizar
$dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$ciudad' and idprod = '$producto' ";
    $resultado = mysqli_query($conn,$dql);
    if( $fila3 = mysqli_fetch_row($resultado) ){
        $old_cant = $fila3[0];
    }
    echo $old_cant;

if( $cant > $old_cant || $old_cant <= 0){
    $new_cant = 0;
}else{
    $new_cant = $old_cant - $cant;
}    
 
if( $cant > $old_cant || $old_cant <= 0){
    $actulizar = "update detalle_bodega
            set cantidad = '$new_cant', estado = 'A'
            where idbod = '$ciudad'
            and idprod = '$producto' ";
}else{
    $actulizar = "update detalle_bodega
    set cantidad = '$new_cant'
    where idbod = '$ciudad'
    and idprod = '$producto' ";
} 

$resultA = mysqli_query($conn,$actulizar);
if( $resultA == false ){
    echo "<script> No se pudo vender </script>";
    //header("location:http://localhost/bodegas_aos/index.php?action=sucursales");
    echo json_encode("no actualizaddo");
}else{
    echo '<script> alert("Vendido")</script>';
    echo json_encode("Actualizado");
    //header("location:http://localhost/bodegas_aos/index.php?action=sucursales");
} 
}  
?>