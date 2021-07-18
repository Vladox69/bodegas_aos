<header class="header ">
    <div class="contenedor contenido-header">
        <div class="barra">

            <?php
            session_start();
            if (isset($_SESSION['nom'])) {
            ?>
                <a href="index.php?action=sucursales">
                    <img src="images/logotipo.png" alt="logotipo de bodegas">
                </a>
                <nav class="navegacion">
                    <a href="index.php?action=sucursales"> Sucursales</a>
                    <a href="index.php?action=productos"> Admin</a>
                    <a href="index.php?action=contacto"> Contacto</a>
                    <a href="models/logout.php"> Cerrar Sesión</a>
                <?php
            } else {
                ?>
                    <a href="index.php?action=login">
                        <img src="images/logotipo.png" alt="logotipo de bodegas">
                    </a>
                    <nav class="navegacion">
                        <a href="index.php?action=login"> Servicios</a>
                        <a href="index.php?action=sucursales"> Sucursales</a>
                        <a href="index.php?action=productos"> Admin</a>
                        <a href="index.php?action=contacto"> Contacto</a>
                    </nav>
                <?php } ?>
        </div>

    </div>
</header>