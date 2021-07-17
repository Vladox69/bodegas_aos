<header class="header ">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="index.php?action=login">
                <img src="images/logotipo.png" alt="logotipo de bodegas">
            </a>
            <nav class="navegacion">
                <a href="index.php?action=login"> Servicios</a>
                <a href="index.php?action=sucursales"> Sucursales</a>
                <a href="index.php?action=productos"> Productos</a>
                <a href="index.php?action=contacto"> Contacto</a>
                <?php
                session_start();
                if(isset($_SESSION['nom'])){
                ?>
                <a href="models/logout.php"> Cerrar Sesión</a>
                <?php
                }
                ?>
            </nav>
        </div>

    </div>
</header>



