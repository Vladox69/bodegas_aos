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
    <main>

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

    
    </main>

</body>
</html>