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
    <link rel="stylesheet" href="css/inicio.css">
    <title>Document</title>
</head>

<body>
    <?php


    if (isset($_SESSION['nom'])) {
        echo "Bienvenido/a ";
        echo $_SESSION['nom'];
    ?>
        <main>

            <div class="centrar" style="margin-bottom: 20px;">
                <main>

                    <form method="post">

                        <div class="centrar" style="margin-bottom: 20px;">

                            <select name="bodegas">
                                <?php
                                $query_bod = "SELECT ciudad FROM bodega";
                                $resultado = mysqli_query($conn, $query_bod);
                                while ($row = mysqli_fetch_row($resultado)) { ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div>
                            <input name="btnConsultar" type="submit" value="Consultar">
                        </div>
                        <div>
                            <input name="buscar" type="text" placeholder="Nombre Producto">
                            <input name="btnBuscar" type="submit" value="Buscar">
                        </div>            
                        <div>

                            <table>
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
                                }else if(isset($_POST['btnBuscar'])){
                                    $nomProducto = $_POST['buscar'];
                                    $sqlBuscar = "SELECT p.nombre, d.cantidad, b.ciudad FROM bodega as b, producto as p, detalle_bodega as d where p.nombre like '".$nomProducto."%' and b.id=d.idbod and p.id=d.idprod order by p.nombre";
                                    $respuesta = $conn->query($sqlBuscar);
                                    while ($fila = mysqli_fetch_row($respuesta)) {?>
                                        <tr>
                                        <td> <?php echo $fila[0]; ?> </td>
                                        <td> <?php echo $fila[1]; ?> </td>
                                        <td> <?php echo $fila[2]; ?> </td>
                                        <tr>
                                    <?php
                                    }
                                }
                            } ?>


                            </table>
                        </div>


                    </form>

                </main>


</body>

</html>