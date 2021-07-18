<html>

<head>
    <meta charset="UTF-8">
    <title>CUNCHI MMV</title>
</head>

<body>

    <form class="contenedor login" action="models/validar.php" method="post">
        
        <h1 class="centrar-texto">
            Login
        </h1>
        <div class="campo">
            <label for="usuario"> Usuario</label>
            <input class="campo__login" type="text" id="usuario" name="usuario"  required="required" />
        </div>

        <div class="campo">
        <label for="contraseña">Contraseña</label>
            <input class="campo__login" type="password" id="contraseña" name="contraseña"  required="required" />
        </div>
        <input class="boton" type="submit" value="Ingresar">
    </form>
</body>

</html>