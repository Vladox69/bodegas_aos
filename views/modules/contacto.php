<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h3 class="centrar-texto">Contacto</h3>
        <div class="contacto-background"></div>
        <form class="formulario">
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre</label>
                <input class="campo__field"
                type="text" 
                placeholder="Tu nombre" 
                id="nombre">
            </div><!--.campo-->

            <div class="campo">
                <label class="campo__label" for="e-mail">E-mail</label>
                <input class="campo__field"
                type="email" 
                placeholder="Tu E-mail" 
                id="e-mail">
            </div><!--.campo-->

            <div class="campo">
                <label class="campo__label" for="mensaje">Mensaje</label>
                <textarea class="campo__field campo__field--textarea"
                id="mensaje">
                </textarea>
            </div><!--.campo-->

            <div class="campo">
                <input type="submit" 
                value="Enviar" 
                class="boton boton--primario">
            </div><!--campo-->       
        </form>

</body>
</html>
