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

        <div class="contenedor ">
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Bodega</th>
                </tr>
                <?php
                $bodega = $_SESSION['ciudad'];
                $sqlSelect = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where b.ciudad='$bodega' and b.id=d.idbod and p.id=d.idprod and d.estado='s'";
                $respuesta = $conn->query($sqlSelect);
                while ($fila = mysqli_fetch_row($respuesta)) { ?>
                    <tr>
                        <td> <?php echo $fila[0]; ?> </td>
                        <td> <?php echo $fila[1]; ?> </td>
                        <td> <?php echo $fila[2]; ?> </td>
                    <tr>
                    <?php } ?>
            </table>
            <br><br>
            <hr>
            <!--vender-->
            <div class="actualizar">
                <h2>Vender Producto</h2>
                <form method="post" id="formulario">
                    <div>
                        <label>Bodega:</label>
                        <select name="bodegas" id="ciud">
                            <option value="<?php echo $_SESSION['idbod'] ?>">
                                <?php echo $_SESSION['ciudad'] ?>
                            </option>

                        </select>
                    </div>
                    <div id="productos" name="producto">
                    </div>
                    <div>
                        <label for="cantidad">Cantidad:</label><input type="number" min=0 id="cant" class="cantidad" name="cantidad">
                        <p id="error" class="formulario__input-error">Ingrese solo numeros</p>
                    </div>

                    <div class="botones">
                        <input type="submit" id="enviar" value="Comprar" name="comprar" class="input">
                    </div>

                </form>
            </div>

            <script src="js/admin.js"></script>

            <!-- Vender producto codigo php -->
            <?php

            if (isset($_POST['comprar'])) {

                $cant = $_POST['cantidad'];
                $ciudad = $_POST['bodegas'];
                $producto = $_POST['productos'];

                //actualizar
                $dql = " SELECT cantidad FROM detalle_bodega WHERE idbod = '$ciudad' and idprod = '$producto' ";
                $resultado = mysqli_query($conn, $dql);
                if ($fila3 = mysqli_fetch_row($resultado)) {
                    $old_cant = $fila3[0];
                }

                if ($cant == $old_cant) {
                    $new_cant = 0;
                } else  if ($cant > $old_cant) {
                    $new_cant = $old_cant;
                } else {
                    $new_cant = $old_cant - $cant;
                }

                if ($cant == $old_cant) {
                    $actulizar = "update detalle_bodega
                    set cantidad = '$new_cant', estado = 'A'
                    where idbod = '$ciudad'
                    and idprod = '$producto' ";
                } else {
                    $actulizar = "update detalle_bodega
                    set cantidad = '$new_cant'
                    where idbod = '$ciudad'
                    and idprod = '$producto' ";
                }

                $resultA = mysqli_query($conn, $actulizar);
                if ($resultA == false) {
                    echo "<script> No se pudo vender </script>";
                    //echo json_encode("no actualizaddo");
                } else {
                    if ($cant > $old_cant) {
                        echo "<script> alert('Stock insuficiente' ) </script>";
                    } else {
                        echo '<script> alert("Vendido")</script>';
                    }
                    //echo json_encode("Actualizado");
                }
            }
            ?>
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