<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

    include 'conexion.php';
    //$Bodega=$_POST['bodegas'];
    $Bodega="QUITO";

   // $sqlSelect="SELECT * FROM producto where id in (select idprod from detalle_bodega where idbod=(select id from bodega where ciudad='$Bodega'))"; 

    $sqlSelect="SELECT p.nombre, d.cantidad  FROM bodega as b, producto as p, detalle_bodega as d where b.ciudad='$Bodega' and b.id=d.idbod and p.id=d.idprod";
    
    $respuesta=$conn->query($sqlSelect);
    $result=array();

    if($respuesta->num_rows > 0){
        while($fila=$respuesta -> fetch_assoc()){
            array_push($result, $fila);
        }
    }else{
        $result="no hay productos";    
    }

    echo json_encode($result);

?>