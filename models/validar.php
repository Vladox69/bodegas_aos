<?php
session_start();
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("bbo4bxid24vtckefdtix-mysql.services.clever-cloud.com","bbo4bxid24vtckefdtix","MQrORY1LgWcC5s9V8im4","bbo4bxid24vtckefdtix");

$consulta="SELECT nombre,perfil,idbod,ciudad FROM usuarios as a,bodega as b WHERE a.nombre='$usuario' and a.contra='$contraseña' and a.idbod=b.id";

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
    $_SESSION['ciudad']=$filas['ciudad'];
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

