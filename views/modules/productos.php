<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


if(isset($_SESSION['nom'])){
    if($_SESSION['perfil'] == "admin"){
        include("models/administrador.php"); 
    }else{
        echo("<br><br>");
        echo("<h1>Solo el administrador puede acceder a esta pestaña</h1>");
    }
}else{
    echo("<br><br>");
    echo("<h1>Es necesario iniciar sesión para acceder a esta pestaña</h1>");
}   
?> 
</body>
</html>