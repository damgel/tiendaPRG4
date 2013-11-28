<?php //include_once 'Includes/session.php';                                                            ?>
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
            <?php include_once 'cesta_drawgrid.php'; ?>
            <div>
                <?php
                include_once 'cesta_gridinfo.php';
                ?>
                <form class="procesar-compra" method="POST">
                    <input name="id_txt" type="hidden" value="<?php echo $mi_carrito[$i]['id'] ?>" />
                    <input name="nombre" type="hidden" value="<?php echo $mi_carrito[$i]['nombre'] ?>" />
                    <input name="cantidad" type="hidden" value="<?php echo $mi_carrito[$i]['cantidad'] ?>" />
                    <input name="total" type="hidden" value="<?php echo $subtotal ?>" />
                    <input type="<?php include_once 'cesta_desactivar.php'; ?>" value="Procesar Compra"><input type='hidden' value='1' name='submitted' />
                    <?php
                    if (isset($_POST['submitted'])) {
                        ///AQUI VERIFICAR SI EL CLIENTE YA TIENE UNA COMPRA PENDIENTE
                        $id_usuario = $_SESSION['userid'];
                        $cod_compra;
                        $hash_compra;
                        $getCodCompra = mysql_query("SELECT compra_pendiente FROM `cliente` where idcliente=$id_usuario") or trigger_error(mysql_error());
                        while ($rowcp = mysql_fetch_array($getCodCompra)) {
                            $cod_compra = $rowcp['compra_pendiente'];
                        }
                        if ($cod_compra == "") {
                            $hash_compra = uniqid();
                        } else {
                            $hash_compra = $cod_compra;
                        }
                        //$hash_compra = uniqid();
                        //END VERIFICACION DE COMPRA EXISTENTE
                        //ACTUALIZAR CODIGO DE COMPRA PARA MANTENER INTEGRIDAD
                        $setCodCompra = "UPDATE`cliente` SET `compra_pendiente`='$hash_compra' where idcliente='$id_usuario'";
                        mysql_query($setCodCompra) or die(mysql_error());

                        // OBTENER LOS PRODUCTOS QUE ESTAN EN CARRITO DEL USUARIO ACTUAL
                        $query = "SELECT id_p, nombre, cantidad, subtotal FROM carrito where id_u=$id_usuario";
                        $result = mysql_query($query) or die(mysql_error());
                        $pivotCompra = 0;
                        while ($row = mysql_fetch_array($result)) {
                            $id_p = $row['id_p'];
                            $nombre_p = $row['nombre'];
                            echo $nombre_p;
                            if ($pivotCompra == 0) {
                                $nombre_p = $row['nombre'];

                                //GUARDANDO EL COD_COMPRA Y PREPARANDO PARA PROCESAR LOS DETALLES
                                $setCompra = "INSERT INTO `compra` ( `cod_compra` ,  `id_u` ,  `fecha` ,  `cantidad_p` ,  `total`  ) VALUES(  '$hash_compra' ,  $id_usuario ,  now() , $cantidad_p ,  '{$_POST['total']}'  ) ";
                                mysql_query($setCompra) or die(mysql_error());
                                $pivotCompra = 1;
                            }
                            $setDetalleCompra = "INSERT INTO `detalles_compra` ( `cod_compra` ,  `id_u` ,  `nombre_p`,`fecha` ) VALUES(  '$hash_compra' ,  $id_usuario ,  '$nombre_p' ,  now()  ) ";
                            mysql_query($setDetalleCompra) or die(mysql_error());

                            //QUERY QUE HACE EL DESCUENTA EL PRODUCTO VENDIDO
                            $updateExistencia = "UPDATE producto set existencia_p=((select existencia_p)-$cantidad_unitatia) where id_p=$id_p";
                            mysql_query($updateExistencia) or die(mysql_error());
                        }

                        //QUERY QUE ELIMINA TODOS LOS PRODUCTOS DESPUES DE PROCESAR UNA COMPRA
                        mysql_query("DELETE FROM `carrito` WHERE id_u = $id_usuario ");
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