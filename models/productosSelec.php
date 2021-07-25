<?php
$conn= mysqli_connect('bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com','root','','bodegas');
$ciud=$_POST['ciud'];
$sqlSelect="SELECT DISTINCT producto.id,producto.nombre FROM producto,bodega , detalle_bodega WHERE detalle_bodega.idbod='$ciud' and producto.id=detalle_bodega.idprod";

$result=mysqli_query($conn,$sqlSelect);
$cadena="<label>Productos:</label>
        <select id='productos' name='productos'>  <option value disabled selected>
        Selecciona un producto
    </option>";
  while($ver=mysqli_fetch_row($result)){
      $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
  }      
  echo $cadena."</select>";
?>