<?php include_once 'clases/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Catalogo de productos</title>
        <link rel="stylesheet" href="assets/css/catalogo.css">
    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">
            <div class="titulos">
                <?php include_once 'li-categoria.php'; ?><br>
                <p  class="carrito"><a href="carrito.php">Ver Carrito</a></p>
            </div>
            <div class="buscador">
                <hr></hr>
                <form id="form1" name="form1" method="POST" action="">
                    <div>
                        <label for="buscar" class="lbl-buscar">Buscar:</label>
                        <input type="text" name="buscar" id="buscar" /></td>
                        <input type="submit" name="Aceptar" id="Aceptar" value="Buscar" />
                    </div>
                    <div>
                        <label for="">Filtrar por: </label>
                        <select name="" onchange="this.form.submit()">
                            <option value="">seleccione</option>
                            <option value="">Precio mas alto</option>
                            <option value="">Precio mas bajo</option>
                        </select>
                    </div>
                </form>
            </div>

            <?php
            /* CONSULTA QUE BUSCA POR LOS CRITERIOS ESPECIFICADOS POR EL USUARIO */

            $consulta = mysql_query("select * from producto where activo_p='S'");
            if (isset($_POST['buscar'])) {
                $rango_inicio = '0';
                $rango_fin = $_POST['buscar'];
                // $consulta = mysql_query("select * from producto where (activo_p='S' and nombre_p like '%" . $_POST['buscar'] . "%') or (activo_p='S' and precio_p betwenn $rango_inicio and $rango_fin.%)");
                $consulta = mysql_query("select * from producto where (activo_p='S' and nombre_p like '%" . $_POST['buscar'] . "%') or (activo_p='S' and precio_p like '%" . $_POST['buscar'] . "%') ");
            }
            /* CONSULTA QUE FILTRA LAS BUSQUEDAS POR CATEGORIAS, RECIBE LOS PARAMETROS DEL 
             * MENU SUPERIOR CON LA LISTA DE CATEGORIAS */
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $consulta = mysql_query("select * from producto where activo_p='S' and categoria_p like '%" . $id . "%'");
            }

            if ((mysql_num_rows($consulta)) === 0) {
                echo "<h1>Producto no encontrado! :' ( </h1>";
                echo "<h2><a href = 'Catalogo.php'>Regresar</a></h2>";
            } else {
                while ($filas = mysql_fetch_array($consulta)) {
                    $id = $filas['id_p'];
                    $imagen = $filas['imagen_p'];
                    $nombre = $filas['nombre_p'];
                    $desc = $filas['descripcion_p'];
                    $precio = $filas['precio_p'];
                    $enStock = $filas['existencia_p'];
                    $fecha = $filas['fecha_p'];
                    ?>
                    <div id="productsWrapper">
                        <ul id="products" data-role="listview" data-inset="true">
                            <li class="product">
                                <img class="hide-from-desktop" src="<?php echo $imagen; ?>" alt="Imagen de <?php echo $nombre ?>" />
                                <div class="productInfo">
                                    <h3><?php echo $nombre ?></h3>
                                    <img class="product-image hide-from-mobile" src="<?php echo $imagen; ?>" alt="Imagen de <?php echo $nombre ?>" />
                                    <p class="description"><?php echo $desc ?></p>
                                    <p class="price hide-from-desktop"><?php echo $precio ?></p>                    
                                </div>
                                <!-- Desktop only -->
                                <div class="action  hide-from-mobile">
                                    <p class="price"><?php echo "$" . $precio ?>
                                    <form action="carrito.php" method="post" name="compra">
                                        <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
                                        <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                                        <input name="precio" type="hidden" value="<?php echo $precio ?>" />
                                        <input name="cantidad" type="hidden" value="1" />
                                        <input class="order-button" name="Comprar" type="submit" value="Agregar al carrito" />
                                    </form>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </body>
</html>