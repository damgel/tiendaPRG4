<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar Producto</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">
            <?
            include_once 'clases/db_connect.php';
            if (isset($_GET['id'])) {
                $id_p = (int) $_GET['id'];
                if (isset($_POST['submitted'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    $sql = "UPDATE `producto` SET  `imagen_p` =  '{$_POST['imagen_p']}' ,  `nombre_p` =  '{$_POST['nombre_p']}' ,  `descripcion_p` =  '{$_POST['descripcion_p']}' ,  `categoria_p` =  '{$_POST['categoria_p']}' ,  `precio_p` =  '{$_POST['precio_p']}' ,  `activo_p` =  '{$_POST['activo_p']}' ,  `existencia_p` =  '{$_POST['existencia_p']}' ,  `fecha_p` =  now() ,  `marca_p` =  '{$_POST['marca_p']}' ,  `costo_p` =  '{$_POST['costo_p']}'   WHERE `id_p` = '$id_p' ";
                    mysql_query($sql) or die(mysql_error());
                    echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
                    echo "<a href='list.php'>Regresar</a>";
                }
                $row = mysql_fetch_array(mysql_query("SELECT * FROM `producto` WHERE `id_p` = '$id_p' "));
                ?>

                <form action='' method='POST'> 
                    <div><b>Imagen:</b><br /><input type='text' name='imagen_p' value='<?= stripslashes($row['imagen_p']) ?>' /></div> 
                    <div><b>Nombre:</b><br /><input type='text' name='nombre_p' value='<?= stripslashes($row['nombre_p']) ?>' /></div> 
                    <div><b>Descripcion:</b><br /><input type='text' name='descripcion_p' value='<?= stripslashes($row['descripcion_p']) ?>' /></div> 
                    <div><b>Categoria:</b><br /><input type='text' name='categoria_p' value='<?= stripslashes($row['categoria_p']) ?>' /></div> 
                    <div><b>Costo:</b><br /><input type='text' name='costo_p' value='<?= stripslashes($row['costo_p']) ?>' /></div> 
                    <div><b>Precio de Venta:</b><br /><input type='text' name='precio_p' value='<?= stripslashes($row['precio_p']) ?>' /></div> 
                    <div><b>Activo:</b><br /><input type='text' name='activo_p' value='<?= stripslashes($row['activo_p']) ?>' /></div> 
                    <div><b>Marca:</b><br /><input type='text' name='marca_p' value='<?= stripslashes($row['marca_p']) ?>' /></div> 

                    <div><input type='submit' value='Editar Producto' /><input type='hidden' value='1' name='submitted' /></div> 
                </form> 
            <? }
            ?> 


        </div>
    </body>
</html>
