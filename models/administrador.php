<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sucursal.css">
    <title>Document</title>
</head>
<body>
<div class = "contenedor">
<?php
   include ("conexion.php");

   $queryAll = "select b.ciudad, p.nombre, db.cantidad, db.estado
               from bodega as b, detalle_bodega as db, producto as p
               where db.idbod = p.id
               and db.idprod = b.id";
   $result = mysqli_query($conn,$queryAll);
?>
<table>
    <tr>
        <td><b>BODEGA</b></td>
        <td><b>PRODUCTO</b></td>
        <td><b>CANTIDAD</b></td>
        <td><b>ESTADO</b></td>
    </tr>
    <?php while( $filas = mysqli_fetch_row($result) ) { ?>
        <tr>
            <td><?php echo $filas[0] ?></td>
            <td><?php echo $filas[1] ?></td>
            <td><?php echo $filas[2] ?></td>
            <td><?php echo $filas[3] ?></td>
        </tr>

    <?php } ?>
</table>
</div>

<hr>

<!-- Actualizar Producto-->
<?php
   $sqlPro = "SELECT * FROM producto";
   $sqlCiu = "SELECT * FROM bodega";
   $pro = mysqli_query($conn,$sqlPro);
   $ciu = mysqli_query($conn,$sqlCiu);
?>

<div class="actualizar">
    <form action="actualizarProductos.php"  method="post" id="formulario">

    <label for="">Producto:</label>
    <select name="producto" id="">
        <?php while ($fila = mysqli_fetch_row($pro)){  ?>
            <option value="<?php echo $fila[1] ?>"> <?php echo $fila[1] ?> </option>
        <?php } ?>
    </select>
        </br>
    <label for="">Bodegas:  </label>
    <select name="ciudad" id="" >
        <?php while ($fila = mysqli_fetch_row($ciu)){  ?>
            <option value="<?php echo $fila[1] ?>"> <?php echo $fila[1] ?> </option>
        <?php } ?>
    </select>

    <div>
        <label for="cantidad">Cantidad:</label><input type="text" id="cant" class="cantidad" name="cantidad">
        <p id="error" class="formulario__input-error" >Ingrese solo numeros</p>
    </div>

    <div class="botones">
        <input type="submit"  id="enviar" value="Enviar" name="enviar" >
    </div>

    </form>
</div>
    <script src="../js/admin.js" ></script>
</body>
</html>