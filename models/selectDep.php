<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Select dependiente</title>
</head>

<body>
    <h2>Ciudades</h2>
    <div>
        
    </div>
    

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
            url:"http://bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com/bodegas_aos/models/productosSelec.php",
            data:"ciud="+$('#ciud').val(),
            success:function(r){
                $('#productos').html(r);
            }
        });
    }    
</script>
