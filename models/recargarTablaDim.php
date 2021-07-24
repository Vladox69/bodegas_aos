<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="tool-bar">
        <div>
            <select id="ciud_tabla" name="bodegas_tabla">
                <option value disabled selected>
                    Selecciona una ciudad
                </option>
                <option value="GUAYAQUIL">GUAYAQUIL</option>
                <option value="QUITO">QUITO</option>
                <option value="CUENCA">CUENCA</option>
            </select>

            <input  name="buscar" type="text" placeholder="Nombre Producto" id="nom_tabla">
            <button name="btnBuscar" type="submit" value="Buscar">
                <i class="material-icons">search</i>
            </button>
            <div id="tabla">

            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        recargarTabla();
        $('#ciud_tabla').change(function() {
            recargarTabla();
        });
    })
</script>

<script type="text/javascript">
    function recargarTabla() {
        $.ajax({
            type: "POST",
            url: "http://localhost/bodegas_aos/models/productosTabla.php",
            data: "ciud_tabla=" + $('#ciud_tabla').val(),
            success: function(r) {
                $('#tabla').html(r);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        recargarBusqueda();
        $('#nom_tabla').change(function() {
            recargarBusqueda();
        });
    })
</script>

<script type="text/javascript">
    function recargarBusqueda() {
        $.ajax({
            type: "POST",
            url: "http://localhost/bodegas_aos/models/productosSearch.php",
            data: "nom_tabla=" + $('#nom_tabla').val(),
            success: function(r) {
                $('#tabla').html(r);
            }
        });
    }
</script>