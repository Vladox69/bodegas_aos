<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href= "css/normalize.css" type = "text/css">
    <link rel=StyleSheet href= "css/template.css" type = "text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      
    <title>Bodegas AOS</title>
    
</head>
<body>
       
        <?php 
            include "modules/navigation.php";
        ?>

    <main class="contenedor" >
        <?php
            $mvc = new MvcController();
            $mvc -> enlacesPaginasController();
        ?>
    </main>
        <!--
        <?php include "modules/footer.php" ?>
        -->
    
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        recargarList();
        $('#ciud').change(function(){
            recargarList();
        });
    })
</script>

<script type="text/javascript">
    function recargarList(){
        $.ajax({
            type:"POST",
            url:"http://localhost/bodegas_aos/models/productosSelec.php",
            data:"ciud="+$('#ciud').val(),
            success:function(r){
                $('#productos').html(r);
            }
        });
    }    
</script>

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