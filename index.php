<?php include_once 'clases/db_connect.php'; ?>

<?php
/* SESIONES Y  VARIABLES GLOBALES DE CONFIGURACION PARA ALMACENAR LOS CRITERIOS DE BUSQUEDA */
$_SESSION['categoria'];
$_SESSION['precio'];
$_SESSION['color'];
$_SESSION['tamanio'];
//echo "LA CATEGORIA SELECCIONADA ES: ".$_SESSION['categoria'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Catalogo de productos</title>
        <link rel="stylesheet" href="assets/css/catalogo.css">  
        <link rel="stylesheet" href="assets/css/bootstrap.css">  


        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/holder.js"></script>

    </head>
    <body>
        <div class="contenedor-index">
            <div id="carrito-info"> <p>Carrito</p>
            </div>
            
            <div class="header">
                <a class="brand">
                    <img src="assets/store-logo.jpg">
                </a>
                  <div class="usuario-data">
                    <p>Bienvenido <a id="usuario" href="<?php echo $_SESSION['url']; ?>">
                            <?php
                            session_start();
                            if (!empty($_SESSION['username'])) {
                                $nombre = $_SESSION['username'];
                                $_SESSION['url'] = "profile.php";
                                echo $nombre;
                                echo "<a href='logoff.php'>Cerra Sesion</a>";
                            } else {
                                $_SESSION['url'] = "logon.php";
                                echo "<a id='enlace' href='logon.php'>Entrar</a>";
                            }
                            ?></a></p>
                </div>
                
                <form id="form1"  name="form1" method="POST" action="">
                    
                    <div>
                        <label for="buscar" class="lbl-buscar"><a href="index.php">Buscar:</a></label>
                        <input type="text" name="buscar" id="buscar" /></td>
                        <input type="submit"  id="btn-buscar" name="Aceptar" id="Aceptar" value="Buscar" />
                    </div>
                    
                </form>
                <form id="form2" name="form2" method="POST" action="index.php">
                    <div>
                        <label for="">Precio:</label><a href="index.php?id=alto" class="glyphicon glyphicon-arrow-up">alto</a><a href="index.php?id=bajo" class="glyphicon glyphicon-arrow-down">bajo</a>
                        <label for="">Color</label>
                        <select name="color" onchange="this.form.submit();">
                            <option>Seleccione:</option>
                            <?php include_once 'clases/listas/colores.php'; ?>
                        </select>
                    </div>
                </form>
                <form id="form3" name="form2" method="GET" action="">
                    <div>
                        <label for="">Tamanio</label>
                        <select name="size" onchange="this.form.submit();">
                            <option value=""><?php echo $_SESSION['filtro2'] ?></option>
                            <?php include_once 'clases/listas/tallas.php'; ?>
                        </select>
                    </div>
                </form>
                
              
            </div>
            <div class="categorias">
                <?php include_once 'li-categoria.php'; ?>
            </div>


            <?php
            /* CONSULTA QUE BUSCA POR LOS CRITERIOS ESPECIFICADOS POR EL USUARIO */

            $consulta = mysql_query("select * from producto where activo_p='S'");
            if (isset($_POST['color'])) {
                $consulta = mysql_query("select * from producto where activo_p = 'S' and color_p like '%" . $_POST['color'] . "%'");
            }

            if (isset($_POST['buscar'])) {
                $rango_inicio = '0';
                $rango_fin = $_POST['buscar'];
                //$consulta = mysql_query("select * from producto where (activo_p = 'S' and nombre_p like '%" . $_POST['buscar'] . "%' ) or (activo_p = 'S' and precio_p like '%" . $_POST['buscar'] . "%' ) ");
                $consulta = mysql_query("select * from producto where activo_p = 'S' and (nombre_p like '%" . $_POST['buscar'] . "%' ) or (precio_p between '0' and '" . $_POST['buscar'] . "') or (categoria_p like '%" . $_POST['buscar'] . "%') or (marca_p like '%" . $_POST['buscar'] . "%')");
            }
            /* CONSULTA QUE FILTRA LAS BUSQUEDAS POR CATEGORIAS, RECIBE LOS PARAMETROS DEL  
             * MENU SUPERIOR CON LA LISTA DE CATEGORIAS */
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $consulta = mysql_query("select * from producto where activo_p = 'S' and categoria_p like '%" . $id . "%'");

                if ($id == "bajo") {
                    $_SESSION['filtro'] = "bajo";
                    $consulta = mysql_query("select * from producto where activo_p = 'S' order by precio_p asc");
                } elseif ($id == "alto") {
//                    $_SESSION['filtro'] = "Filtro establecido";
                    $_SESSION['filtro'] = "alto";
                    $consulta = mysql_query("select * from producto where activo_p = 'S' order by precio_p desc");
                }
            }

            if ((mysql_num_rows($consulta)) === 0) {
                echo "<h1>Producto no encontrado!:' ( </h1>";
                echo "<h2><a href = 'index.php'>Regresar</a></h2>";
            } else {
                while ($filas = mysql_fetch_array($consulta)) {
                    $id = $filas['id_p'];
                    $imagen = $filas['imagen_p'];
                    $nombre = $filas['nombre_p'];
                    $desc = $filas['descripcion_p'];
                    $marca = $filas['marca_p'];
                    $talla = $filas['tamanio_p'];
                    $precio = $filas['precio_p'];
                    $enStock = $filas['existencia_p'];
                    $fecha = $filas['fecha_p'];
                    ?>
                    <div id="productsWrapper">
                        <ul id="products" data-role="listview" data-inset="true">
                            <li class="product">
                                <img class="hide-from-desktop" src="<?php echo $imagen; ?>" alt="Imagen de <?php echo $nombre ?>" />
                                <div class="productInfo">
                                    <img class="product-image hide-from-mobile" src="<?php echo $imagen; ?>" alt="Imagen de <?php echo $nombre ?>" />
                                    <h3><?php echo $nombre ?></h3>
                                    <p class="description"><span class="bolder-title"></span><?php echo $desc ?></p>
                                    <p class="description"><span class="bolder-title">Marca:</span><?php echo $marca ?></p>
                                    <p class="description"><span class="bolder-title">Tamanio:</span><?php echo $talla ?></p>
                                    <p class="price hide-from-desktop"><?php echo $precio ?></p>                    
                                </div>
                                <!-- Desktop only -->
                                <div class="action  hide-from-mobile">
                                    <p class="price"><?php echo "$" . $precio ?>
                                    <form action="addCarrito.php" class="frmCarrito" method="post" name="compra">
                                        <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
                                        <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                                        <input name="precio" type="hidden" value="<?php echo $precio ?>" />
                                        <style>

                                        </style>
                                        <label for="cantidad" class="col-lg-3 control-label">Cantidad</label>

                                        <input name="cantidad" type="text" value="1"  required/>
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