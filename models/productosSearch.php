<?php
include 'conexion.php';
//$conn= mysqli_connect('bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com','rooumyq6rfhdrdgbcomt','','bodegas');
$product_search=$_POST['nom_tabla'];

$sqlBuscar = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where p.nombre like '" . $product_search . "%' and b.id=d.idbod and p.id=d.idprod and d.estado='s' order by p.nombre";

$result=mysqli_query($conn,$sqlBuscar);
$cadena="<table class='tabla'> 
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Bodega</th>
    </tr>";
  while($ver=mysqli_fetch_row($result)){
      $cadena=$cadena.'<tr><td>'.utf8_encode($ver[0]).'</td>'.'<td>'.utf8_encode($ver[1]).'</td>'.'<td>'.utf8_encode($ver[2]).'</td><tr>';
  }      
  echo $cadena."</table><br>";

?>