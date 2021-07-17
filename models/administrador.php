<?php
   include ("conexion.php");

   $queryAll = "select b.ciudad, p.nombre, db.cantidad, db.estado
               from bodega as b, detalle_bodega as db, producto as p
               where db.idbod = p.id
               and db.idprod = b.id";
   
   $result = mysqli_query($conn,$queryAll);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table{
	border: 1px solid black;
	border-collapse: collapse;
}
table td{
	border:1px solid black;
	padding: 10px 20px;
	text-transform: uppercase;
}
table tr:hover{
	background:#ccc;
}
table td:hover{
	color: blue;
}
.contenedor {
        color: black;
    }

</style>
<body>
<div class = "contenedor">
<table>
    <tr>
        <td><b>BODEGA</b></td>
        <td><b>PRODUCTO</b></td>
        <td><b>CANTIDAD</b></td>
        <td><b>ESTADO</b></td>
    </tr>
    <?php while( $filas = mysqli_fetch_row($result) ) { ?>
        <tr>
            <td><?php echo $filas[0] ?></td>
            <td><?php echo $filas[1] ?></td>
            <td><?php echo $filas[2] ?></td>
            <td><?php echo $filas[3] ?></td>
        </tr>

    <?php } ?>
</table>
</div>
    
</body>
</html>