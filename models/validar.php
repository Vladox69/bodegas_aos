<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","bodegas");

$consulta="SELECT*FROM usuarios where nombre='$usuario' and contra='$contraseña'";

$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_fetch_array($resultado);

if(is_null($filas)){
    
    echo "<script>
               alert('Usuario o contraseña incorrecto');
               window.location= '../views/modules/login.php'
   </script>";
?>
<?php



    
}else
    session_start();
    $_SESSION['nom'] = $filas['nombre']; 
    $_SESSION['perfil'] = $filas['perfil'];
    $_SESSION['idbod'] = $filas['idbod'];
    if($filas['perfil']=='admin'){ //administrador
    header("location:../views/modules/sucursales.php");

    }else
    if($filas['perfil']=='vendedor'){ //vendedor
    header("location:../views/modules/productos.php");
    }
    else{
    ?>
    <?php
    include("../index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}

mysqli_free_result($resultado);

mysqli_close($conexion);

