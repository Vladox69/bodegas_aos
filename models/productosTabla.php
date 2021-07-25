<?php
$conn= mysqli_connect('localhost','root','','bodegas');
$ciud_tabla=$_POST['ciud_tabla'];
$sqlSelect = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where b.id='$ciud_tabla' and b.id=d.idbod and p.id=d.idprod and d.estado='s'";

$result=mysqli_query($conn,$sqlSelect);
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
