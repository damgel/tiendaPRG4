<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar Producto</title>
        
        <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include_once '../Includes/header.php'; ?>
        <div class="contenedor">
            <?php
            /*  CODIGO PARA ACTIVAR AL PASAR PARAMETROS DESDE EL PANEL DE PRODUCTOS */
            include_once '../clases/db_connect.php';
            if (isset($_GET['activar'])) {
                $activar_p = (int) $_GET['activar'];

                foreach ($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                }
                $sql = "UPDATE `producto` SET  `activo_p` =  'S',  `fecha_p` =  now()  WHERE `id_p` = '$activar_p' ";
                mysql_query($sql) or die(mysql_error());
                echo 'PRODUCTO ACTIVADO<br>';
                echo "<a href='administrarProductos.php'>Regresar</a>";
            }
            /*  CODIGO PARA DESACTIVAR AL PASAR PARAMETROS DESDE EL PANEL DE PRODUCTOS */
            if (isset($_GET['desactivar'])) {
                $desactivar_p = (int) $_GET['desactivar'];

                foreach ($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                }
                $sql = "UPDATE `producto` SET  `activo_p` =  'N',  `fecha_p` =  now()  WHERE `id_p` = '$desactivar_p' ";
                mysql_query($sql) or die(mysql_error());
                echo 'PRODUCTO DESACTIVADO<br>';
                echo "<a href='administrarProductos.php'>Regresar</a>";
            }
            /* CODIGO PARA ELIMINAR AL PASAR PARAMETROS DESDE EL PANEL DE PRODUCTOS */
            if (isset($_GET['eliminar'])) {
                $eliminar_p = (int) $_GET['eliminar'];

                mysql_query("DELETE FROM `producto` WHERE `id_p` = '$eliminar_p' ");
                echo (mysql_affected_rows()) ? "Producto eliminado!.<br /> " : "El producto no se pudo eliminar.<br /> ";
                echo 'PRODUCTO ELIMINADO<br>';
                echo "<a href='administrarProductos.php'>Regresar</a>";
            }
            ?>
            <?
            /* CODIGO QUE POR DEFECTO AL CARGAR LA PAGINA PERMITE CARGAR LOS VALORES DEL PRODUCTO PASADO COMO PARAMETRO 
             * Y A LA VEZ PERMITE ACTUALIZAR LA INFORMACION EN LA BASE DE DATOSS
             * 
             */
            include_once 'clases/db_connect.php';
            if (isset($_GET['id'])) {
                $id_p = (int) $_GET['id'];
                if (isset($_POST['submitted'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    $sql = "UPDATE `producto` SET  `imagen_p` =  '{$_POST['imagen_p']}' ,  `nombre_p` =  '{$_POST['nombre_p']}' ,  `descripcion_p` =  '{$_POST['descripcion_p']}' ,  `categoria_p` =  '{$_POST['categoria_p']}' ,  `precio_p` =  '{$_POST['precio_p']}' ,  `activo_p` =  '{$_POST['activo_p']}' ,  `existencia_p` =  '{$_POST['existencia_p']}' ,  `fecha_p` =  now() ,  `marca_p` =  '{$_POST['marca_p']}' ,  `costo_p` =  '{$_POST['costo_p']}'   WHERE `id_p` = '$id_p' ";
                    mysql_query($sql) or die(mysql_error());
                    header("Location: administrarProductos.php");
                }
                $row = mysql_fetch_array(mysql_query("SELECT * FROM `producto` WHERE `id_p` = '$id_p' "));
                ?>

                <form action='' method='POST'> 
                    <div><b>Imagen:</b><br /><input type='text' name='imagen_p' value='<?= stripslashes($row['imagen_p']) ?>' /></div> 
                    <div><b>Nombre:</b><br /><input type='text' name='nombre_p' value='<?= stripslashes($row['nombre_p']) ?>' /></div> 
                    <div><b>Descripcion:</b><br /><input type='text' name='descripcion_p' value='<?= stripslashes($row['descripcion_p']) ?>' /></div> 
                    <div><b>Costo:</b><br /><input type='text' name='costo_p' value='<?= stripslashes($row['costo_p']) ?>' /></div> 
                    <div><b>Precio de Venta:</b><br /><input type='text' name='precio_p' value='<?= stripslashes($row['precio_p']) ?>' /></div> 
                    <div><select name="activo_p">
                            <option value="S">Activo</option>
                            <option value="N">No activo</option>
                        </select></div>
                    <div><b>Marca:</b><br /><input type='text' name='marca_p' value='<?= stripslashes($row['marca_p']) ?>' /></div>
                    <div><b>Existencia:</b><br /><input type='text' name='existencia_p' value='<?= stripslashes($row['existencia_p']) ?>' /></div>
                    <div><b>Categoria:</b><br><select name="categoria_p" required><option>-seleccione-</option><?php include_once '../clases/listas/categorias.php'; ?></select></div>
                    <div><input type='submit' value='Editar Producto' /><input type='hidden' value='1' name='submitted' /></div> 
                </form> 
            <? }
            ?> 


        </div>
    </body>
</html>
