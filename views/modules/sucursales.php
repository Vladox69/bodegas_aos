<?php
include 'models/conexion.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vender.css">
    <title>Document</title>
</head>

<body>
    <?php


    if (isset($_SESSION['nom'])) {
        echo "<h1> Bienvenid@ " . $_SESSION['nom'] . "</h1>";
    ?>

        <div class="contenedor tabla-contenedor">

            <form method="post">

                <div class="tool-bar">
                    <div class="consulta">
                        <div>
                            <select class="campo__tabla" name="bodegas">
                                <?php
                                $query_bod = "SELECT ciudad FROM bodega";
                                $resultado = mysqli_query($conn, $query_bod);
                                while ($row = mysqli_fetch_row($resultado)) { ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                        <button name="btnConsultar" type="submit" value="Consultar">
                            <i class="material-icons">check</i>
                        </button>
                    </div>
                    <div class="consulta">
                        <div>

                            <input class="campo__tabla" name="buscar" type="text" placeholder="Nombre Producto">
                        </div>
                        <button name="btnBuscar" type="submit" value="Buscar">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                </div>

                <div>

                    <table class="tabla">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Bodega</th>
                        </tr>
                        <?php
                        if (isset($_POST['btnConsultar'])) {
                            $Bodega = $_POST['bodegas'];
                            $sqlSelect = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where b.ciudad='$Bodega' and b.id=d.idbod and p.id=d.idprod";
                            $respuesta = $conn->query($sqlSelect);

                            while ($fila = mysqli_fetch_row($respuesta)) { ?>
                                <tr>
                                    <td> <?php echo $fila[0]; ?> </td>
                                    <td> <?php echo $fila[1]; ?> </td>
                                    <td> <?php echo $fila[2]; ?> </td>
                                <tr>


                                <?php }
                        } else if (isset($_POST['btnBuscar'])) {
                            $nomProducto = $_POST['buscar'];
                            $sqlBuscar = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where p.nombre like '" . $nomProducto . "%' and b.id=d.idbod and p.id=d.idprod order by p.nombre";
                            $respuesta = $conn->query($sqlBuscar);
                            while ($fila = mysqli_fetch_row($respuesta)) { ?>
                                <tr>
                                    <td> <?php echo $fila[0]; ?> </td>
                                    <td> <?php echo $fila[1]; ?> </td>
                                    <td> <?php echo $fila[2]; ?> </td>
                                <tr>
                            <?php
                            }
                        } ?>
                    </table>
                </div>
            </form>


            <br><br>
            <hr>
            <!--vender-->
            <?php
            $sqlPro = "SELECT * FROM producto";
            $pro = mysqli_query($conn, $sqlPro);
            ?>

            <div class="actualizar">
                <h2>Vender Producto</h2>
                <form action="models/venderProductos.php"  method="post" id="formulario">
                    <div>
                        <label for="">Bodega:</label>
                        <select name="bodegas" id="ciud">
                            <option value disabled selected>
                                Selecciona una ciudad
                            </option>
                            <option value="1">GUAYAQUIL</option>
                            <option value="2">QUITO</option>
                            <option value="3">CUENCA</option>
                        </select>
                    </div>
                        <div id="productos" name="producto">
                        </div>

                    <div>
                        <label for="cantidad">Cantidad:</label><input type="number" min=0 id="cant" class="cantidad" name="cantidad">
                        <p id="error" class="formulario__input-error">Ingrese solo numeros</p>
                    </div>

                    <div class="botones">
                        <input type="submit" id="enviar" value="Comprar" name="enviar" class="input" >
                    </div>

                </form>
            </div>
            
            <script src="js/admin.js"></script>


        <?php
    } else {
        ?>

            <h1>Es necesario iniciar sesión para acceder a esta pestaña</h1>
        <?php
    } ?>

        <?php
        $sqlPro = "SELECT * FROM producto";
        $pro = mysqli_query($conn, $sqlPro);
        ?>


</body>

</html>