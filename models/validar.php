<?php
session_start();
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
               window.location= '../index.php?action=login'
   </script>";
?>
<?php



    
}else
    $_SESSION['nom'] = $filas['nombre']; 
    $_SESSION['perfil'] = $filas['perfil'];
    $_SESSION['idbod'] = $filas['idbod'];
    if($filas['perfil']=='admin'){ //administrador
    header('location: ../index.php?action=productos');

    }else
    if($filas['perfil']=='vendedor'){ //vendedor
    header('location: ../index.php?action=sucursales');
    }
    else{
    ?>
    
  
    <?php
    include('location: ../index.php?action=login');

}

mysqli_free_result($resultado);

mysqli_close($conexion);

