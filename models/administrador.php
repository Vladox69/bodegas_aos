<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <?php
        include("conexion.php");

        $queryAll = "select b.ciudad, p.nombre, db.cantidad, db.estado,p.precio
               from bodega as b, detalle_bodega as db, producto as p
               where db.idprod = p.id
               and db.idbod  = b.id";
        $result = mysqli_query($conn, $queryAll);
        ?>
        <th>
            <h2 class="h2">Listado de Productos en Bodegas</h2>
        </th>
        <table>
            <tr>
                <td><b>BODEGA</b></td>
                <td><b>PRODUCTO</b></td>
                <td><b>CANTIDAD</b></td>
                <td><b>ESTADO</b></td>
                <td><b>PRECIO</b></td>
            </tr>
            <?php while ($filas = mysqli_fetch_row($result)) { ?>
                <tr>
                    <td><?php echo $filas[0] ?></td>
                    <td><?php echo $filas[1] ?></td>
                    <td><?php echo $filas[2] ?></td>
                    <td><?php echo $filas[3] ?></td>
                    <td><?php echo $filas[4] ?></td>
                </tr>

            <?php } ?>
        </table>
    </div>

    <br><br>

    <!-- Actualizar Producto-->
    <?php
    $sqlPro = "SELECT * FROM producto";
    $sqlCiu = "SELECT * FROM bodega";
    $pro = mysqli_query($conn, $sqlPro);
    $ciu = mysqli_query($conn, $sqlCiu);
    ?>

    <div class="actualizar">
        <h2>Actualizar Cantidad</h2>
        <form action="models/actualizarProductos.php" method="post" id="formulario">
            <label for="">Bodegas: </label>
            <select id="ciud" name="ciudad">
                <option value disabled selected>
                    Selecciona una ciudad
                </option>
                <option value="1">GUAYAQUIL</option>
                <option value="2">QUITO</option>
                <option value="3">CUENCA</option>
            </select>
            </br>
            <div id="productos" name="producto">
            </div>
            <div>
                <label for="cantidad">Cantidad:</label><input type="number" id="cant" class="cantidad" name="cantidad">
                <p id="error" class="formulario__input-error">Ingrese solo numeros</p>
            </div>

            <div class="botones">
                <input type="submit" id="enviar" value="Enviar" name="enviar">
            </div>

        </form>
    </div>


    <!-- Actualizar Producto-->
    <?php
    $sqlPro = "SELECT * FROM producto";
    $pro = mysqli_query($conn, $sqlPro);
    ?>

    <div class="actualizarN">
        <h2>Actualizar Nombre</h2>
        <form action="models/actualizarNombre.php" method="post" id="formulario2">

            <label for="">Producto:</label>
            <select name="productoN" id="">
                <?php while ($fila = mysqli_fetch_row($pro)) {  ?>
                    <option value="<?php echo $fila[1] ?>"> <?php echo $fila[1] ?> </option>
                <?php } ?>
            </select>

            <div>
                <label for="cantidad">Nombre:</label><input type="text" id="nom" class="cantidad" name="nombre">
                <p id="errorN" class="formulario__input-error">Ingrese solo letras</p>
            </div>

            <div class="botones">
                <input type="submit" id="enviarN" value="Enviar" name="enviar">
            </div>

        </form>
    </div>
    <footer></footer>
    <script src="js/admin.js"></script>
</body>

</html>