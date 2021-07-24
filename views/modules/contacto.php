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
            <div class="tool-bar">
                <div class="consulta">
                    <select id="ciud_tabla" name="bodegas_tabla">
                        <option value disabled selected>
                            Selecciona una ciudad
                        </option>
                        <option value="1">GUAYAQUIL</option>
                        <option value="2">QUITO</option>
                        <option value="3">CUENCA</option>
                    </select>
                </div>
                <div class="consulta">
                    <div>
                        <input class="campo__tabla" name="buscar" type="text" placeholder="Nombre Producto" id="nom_tabla">
                    </div>
                    <button name="btnBuscar" type="submit" value="Buscar">
                        <i class="material-icons">search</i>
                    </button>
                </div>

            </div>
            <div id="tabla">

            </div>
        </div>
        <br>
        <div class="actualizar">
            <h2>Vender Producto</h2>
            <form action="models/venderProductos.php" method="post" id="formulario">
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
                    <input type="submit" id="enviar" value="Comprar" name="enviar" class="input">
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

</body>

</html>