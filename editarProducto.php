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
                $var_id = $_GET['id'];
                if (isset($_POST['submitted'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    $sql = "UPDATE `producto` SET  `nombre_p` =  '{$_POST['nombre_p']}' ,  `descripcion_p` =  '{$_POST['descripcion_p']}' ,  `categoria_p` =  '{$_POST['categoria_p']}' ,  `precio_p` =  '{$_POST['precio_p']}' ,  `activo_p` =  '{$_POST['activo_p']}' ,  `imagen_p` =  '{$_POST['imagen_p']}'   WHERE `id_p` = '$var_id' ";
                    mysql_query($sql) or die(mysql_error());
                    echo (mysql_affected_rows()) ? "Producto Editado.<br />" : "No se pudo modificar el producto <br />";
                    echo "<a href='administrarProductos.php'>Regresar</a>";
                }
                $row = mysql_fetch_array(mysql_query("SELECT * FROM `producto` WHERE `id` = '$id' "));
                ?>

                <form action='' method='POST'> 
                    <div><b>Nombre P:</b><br /><input type='text' name='nombre_p' value='<?= stripslashes($row['nombre_p']) ?>' required/></div> 
                    <div><b>Descripcion P:</b><br /><input type='text' name='descripcion_p' value='<?= stripslashes($row['descripcion_p']) ?>' /></div> 
                    <div><b>Categoria P:</b><br /><input type='text' name='categoria_p' value='<?= stripslashes($row['categoria_p']) ?>' /></div> 
                    <div><b>Precio P:</b><br /><input type='text' name='precio_p' value='<?= stripslashes($row['precio_p']) ?>' /></div> 
                    <div><b>Activo P:</b><br /><input type='text' name='activo_p' value='<?= stripslashes($row['activo_p']) ?>' /></div> 
                    <div><b>Imagen P:</b><br /><input type='text' name='imagen_p' value='<?= stripslashes($row['imagen_p']) ?>' /></div> 
                    <div><input type='submit' value='Guardar Cambios' /><input type='hidden' value='1' name='submitted' /></div> 
                </form> 
            <? } ?> 

        </div>
    </div>
</body>
</html>
