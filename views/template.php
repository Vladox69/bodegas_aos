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

        <?php include "modules/footer.php" ?>
        
    
</body>
</html>