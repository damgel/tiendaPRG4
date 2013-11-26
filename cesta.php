<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Carrito de compras</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <style>
        .total
        {
            padding-right: 50px;

            text-align: right;
            font-size: 24px;   
        }
        .total-pay
        {
            font-weight: bold;
            text-align: right;
        }
        .contenedor
        {
            border:solid 2px #ccc;
            display:block;
            margin:auto;
            margin-top: 25px;
            padding: 25px;
            background-color: white;
        }
        .procesar-compra input[type=submit]
        {

            font-size: 20px;
            width: 250px;
            height: 60px;
        }


    </style>
    <body>
        <?php
        session_start();
        include_once 'Includes/header.php';
        include_once 'clases/db_connect.php';
        ?>
        <div class="contenedor">
            <?php
            include_once 'clases/db_connect.php';
            echo "<table class='table table-bordered table-condensed'>";
            echo "<tr>";
            echo "<td><b>Producto</b></td>";
            echo "<td><b>Precio</b></td>";
            echo "<td><b>Cantidad</b></td>";
            echo "<td><b>Subtotal</b></td>";
            echo "<td><b>Items</b></td>";
            echo "</tr>";
            $usuario = $_SESSION['userid'];
            $result = mysql_query("SELECT id_p, nombre, round(precio,2) as precio, sum(cantidad) as cantidad, round(sum(subtotal),2) as subtotal FROM `carrito` where id_u=$usuario group by nombre") or trigger_error(mysql_error());
            while ($row = mysql_fetch_array($result)) {
                foreach ($row AS $key => $value) {
                    $row[$key] = stripslashes($value);
                }
                echo "<tr>";
                echo "<td valign='top'>" . nl2br($row['nombre']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['precio']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['cantidad']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['subtotal']) . "</td>";
                echo "<td valign='top'><a href=quitar.php?q={$row['id_p']}>Quitar Item</a></td> ";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <div><?php
                $query = "SELECT round(sum(cantidad),0) as cantidad, round(sum(subtotal),2) FROM carrito limit 0,1";
                $result = mysql_query($query) or die(mysql_error());

                while ($row = mysql_fetch_array($result)) {
                    $_SESSION['cantidad_productos'] = $row['cantidad'];
                    $cantidad_p = $_SESSION['cantidad_productos'];
                    echo "<p class='total'>Total a pagar " . " = <b>$ " . $row['round(sum(subtotal),2)'] . "</b></p>";
                    echo "<p class='total'>Productos " . " : <b> " . $row['cantidad'] . "</b></p>";
                    //echo "<script>alert($cantidad_productos)</script>";
                    echo "<br />";
                }
                ?>
                <form class="procesar-compra" method="POST">
                    <input name="id_txt" type="hidden" value="<?php echo $mi_carrito[$i]['id'] ?>" />
                    <input name="nombre" type="hidden" value="<?php echo $mi_carrito[$i]['nombre'] ?>" />
                    <input name="cantidad" type="hidden" value="<?php echo $mi_carrito[$i]['cantidad'] ?>" />
                    <input name="total" type="hidden" value="<?php echo $subtotal ?>" />
                    <input type="submit" value="Procesar Compra"><input type='hidden' value='1' name='submitted' />
                    <?php
                    //PROCESAR LOS PRODUCTOS AQUI

                    if (isset($_POST['submitted'])) {
                        $id_usuario = $_SESSION['userid'];
                        $query = "SELECT id_p,nombre, cantidad, subtotal nombre FROM carrito";
                        $result = mysql_query($query) or die(mysql_error());
                        $pivotCompra = 0;
                        //ID UNICO QUE SE GENERAL AL HACER CLIC EN PRICESAR COMPRA
                        $hash_compra = uniqid();
                        $sqlu = "UPDATE`cliente` SET `compra_pendiente`='$hash_compra' where idcliente='$id_usuario'";
                        mysql_query($sqlu) or die(mysql_error());
                        //, ESTE ID REPRESENTARA LA COMPRA PROCESADA EN LA TABLA "DETALLE DE COMPRAS"
                        while ($row = mysql_fetch_array($result)) {
                            $nombre_p = $row['nombre'];
                            if ($pivotCompra == 0) {
                                echo "NOMBRE " . " = <b>$ " . $row['nombre'] . "</b></p>";
                                $nombre_p = $row['nombre'];
                                $id_producto = $row['id_p'];
                                //GUARDANDO LA COMPRA Y PREPARANDO PARA PROCESAR LOS DETALLES
                                $sql = "INSERT INTO `compra` ( `cod_compra` ,  `id_u` ,  `fecha` ,  `cantidad_p` ,  `total`  ) VALUES(  '$hash_compra' ,  $id_usuario ,  now() , $cantidad_p ,  '{$_POST['total']}'  ) ";
                                mysql_query($sql) or die(mysql_error());
                                $pivotCompra = 1;
                                $sql = "INSERT INTO `compra` ( `cod_compra` ,  `id_u` ,  `fecha` ,  `cantidad_p` ,  `total`  ) VALUES(  '$hash_compra' ,  $id_usuario ,  now() , $cantidad_p ,  '{$_POST['total']}'  ) ";
                                mysql_query($sql) or die(mysql_error());
                                $sql = "INSERT INTO `detalles_compra` ( `cod_compra` ,  `id_u` ,  `nombre_p`,`fecha` ) VALUES(  '$hash_compra' ,  $id_usuario ,  '$nombre_p' ,  now()  ) ";
                                mysql_query($sql) or die(mysql_error());
                            }
                            $sqldp = "INSERT INTO `detalles_compra` ( `cod_compra` ,  `id_u` ,  `nombre_p`,`fecha` ) VALUES(  '$hash_compra' ,  $id_usuario ,  '$nombre_p' ,  now()  ) ";
                            mysql_query($sqldp) or die(mysql_error());
                        }
                        echo "COMPRA PROCESADA EXITOSAMENTE!!!  .<br />";
                    }
                    ?>
                </form>
            </div>
        </div>
        <p><a href="index.php">Regresar a la tienda</a></p>
    </div>
</body>
</html>