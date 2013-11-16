<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Agregar Producto</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">

            <?php
            include_once 'clases/db_connect.php';
            $id = (int) $_GET['id'];
            mysql_query("DELETE FROM `producto` WHERE `id_p` = '$id' ");
            echo (mysql_affected_rows()) ? "Producto eliminado!.<br /> " : "El producto no se pudo eliminar.<br /> ";
            ?> 

            <a href='administrarProductos.php'>Regresar</a>

        </div>
    </body>
</html>
