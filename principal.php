<?php include_once 'clases/db_connect.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Catalogo de productos</title>
        <style type="text/css">
            body {
                background-color: #FFF;
            }
        </style>

    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">
            <style>
                h3
                {
                    text-align: right;
                }
            </style>
            <h1>Super Tienda</h1>
            <h3><a href="carrito.php">Ver Carrito</a></h3>
            <form id="form1" name="form1" method="post" action="">
                <table width="841" border="0" align="left">
                    <tr>
                        <td width="22">&nbsp;</td>
                        <td width="92">&nbsp;</td>
                        <td width="111">&nbsp;</td>
                        <td width="121">&nbsp;</td>
                        <td width="56">&nbsp;</td>
                        <td width="94" align="right">BUSCAR:</td>
                        <td width="144"><label for="buscar"></label>
                            <input type="text" name="buscar" id="buscar" /></td>
                        <td width="167"><input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" /></form></td>
                    </tr>
                    <hr></hr>
                    <tr>
                        <td colspan="8" align="center">LISTADO DE PRODUCTOS</td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9900">ID</td>
                        <td bgcolor="#FF9900">IMAGEN</td>
                        <td bgcolor="#FF9900">NOMBRE</td>
                        <td bgcolor="#FF9900">DESCRIPCION</td>
                        <td bgcolor="#FF9900">PRECIO</td>
                        <td bgcolor="#FF9900">EXISTENCIA</td>
                        <td bgcolor="#FF9900">FECHA</td>
                        <td bgcolor="#FF9900">AGREGAR</td>
                    </tr>
                    <?php
                    /* Un id único, como: 4b3403665fea6 */
                    printf("NombreUnico: %s\r\n", uniqid());
                    $consulta = mysql_query("select * from producto where activo_p='S'");
                    if (isset($_POST['buscar'])) {
                        $consulta = mysql_query("select * from producto where nombre_p like '%" . $_POST['buscar'] . "%'");
                    }

                    while ($filas = mysql_fetch_array($consulta)) {
                        $id = $filas['id_p'];
                        $imagen = $filas['imagen_p'];
                        $nombre = $filas['nombre_p'];
                        $desc = $filas['descripcion_p'];
                        $precio = $filas['precio_p'];
                        $enStock = $filas['existencia_p'];
                        $fecha = $filas['fecha_p'];
                        ?>
                        <tr>
                            <td bgcolor="#FFFADD"><?php echo $id ?></td>
                            <td><img src="<?php echo $imagen; ?>" alt="" width="70" height="70" /><br /></td>
                            <td bgcolor="#FFFADD"><?php echo $nombre ?></td>
                            <td bgcolor="#FFFADD"><?php echo $desc ?></td>
                            <td bgcolor="#FFFADD"><?php echo $precio ?></td>
                            <td bgcolor="#FFFADD"><?php echo $enStock ?></td>
                            <td bgcolor="#FFFADD"><?php echo $fecha ?></td>
                            <td bgcolor="#FFFADD">
                                <form action="carrito.php" method="post" name="compra">
                                    <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
                                    <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                                    <input name="precio" type="hidden" value="<?php echo $precio ?>" />
                                    <input name="cantidad" type="hidden" value="1" />
                                    <input name="Comprar" type="submit" value="Comprar" />
                                </form>
                            </td>
                        </tr>
                        <p>
                        <?php } ?>
                </table>

                </p>

        </div>
    </body>
</html>