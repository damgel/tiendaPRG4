<?php
session_start();
include_once 'clases/db_connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Carrito de compras</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
            <script src="assets/js/jquery-v1.10.2.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <style>
        .total-pay
        {
            font-weight: bold;
            text-align: right;
        }
    </style>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">

            <h3>Productos en el carro:</h3>
            <?php
            if (isset($_SESSION['usuario'])) {
                $actionFrm = "carrito.php";
                ?>
                <?php
                if (isset($_POST['id_txt'])) {
                    $id = $_POST['id_txt'];
                    $nombre = $_POST['nombre'];
                    $precio = $_POST['precio'];
                    $cantidad = $_POST['cantidad'];
                    $mi_carrito[] = array('id' => $id, 'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);
                    //print_r($mi_carrito);
                }
                if (isset($_SESSION['carrito'])) {
                    $mi_carrito = $_SESSION['carrito'];
                    if (isset($_POST['id_txt'])) {
                        $id = $_POST['id_txt'];
                        $nombre = $_POST['nombre'];
                        $precio = $_POST['precio'];
                        $cantidad = $_POST['cantidad'];
                        $pos = -1;
                        for ($i = 0; $i < count($mi_carrito); $i++) {
                            if ($id == $mi_carrito[$i]['id']) {
                                $pos = $i;
                            }
                        }
                        if ($pos <> -1) {
                            $cuanto = $mi_carrito[$pos]['cantidad'] + $cantidad;
                            $mi_carrito[$pos] = array('id' => $id, 'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cuanto);
                        } else {
                            $mi_carrito[] = array('id' => $id, 'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);
                        }
                    }
                }
                if (isset($mi_carrito))
                    $_SESSION['carrito'] = $mi_carrito;
                ?>

                <table class="table table-bordered table-condensed">

                    <tr>
                        <td width="43" bgcolor="#73B9FF">PRODUCTO</td>
                        <td width="43" bgcolor="#73B9FF">PRECIO</td>
                        <td width="43" bgcolor="#73B9FF">CANTIDAD</td>
                        <td width="126" bgcolor="#73B9FF">SUBTOTAL</td>
                    </tr>
                    <?php
                    if (isset($mi_carrito)) {
                        $total = 0;
                        for ($i = 0; $i < count($mi_carrito); $i++) {
                            ?>
                            <tr>
                                <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['nombre'] ?></td>
                                <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['precio'] ?></td>
                                <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['cantidad'] ?></td>
                                <?php
                                $subtotal = $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad'];
                                $total = $total + $subtotal;
                                ?>
                                <td bgcolor="#FFFADD"><?php echo $subtotal ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <?php
                } else {
                    header("Location: Registrarse.php");
                }
                ?>
                <tr>
                    <td bgcolor="#FFFADD">&nbsp;</td>
                    <td bgcolor="#FFFADD">&nbsp;</td>
                    <td bgcolor="#FFFADD" class="total-pay">Total a pagar:</td>
                    <td bgcolor="#FFFADD" class="total-pay"><?php if (isset($total)) echo '$ ' . $total ?></td>
                </tr>
            </table>
            <div class="action  hide-from-mobile">
                <p>
                    <form action="procesarCompra.php" method="post" name="compra">
                        <input name="id_txt" type="hidden" value="<?php echo $mi_carrito[$i]['id'] ?>" />
                        <input name="nombre" type="hidden" value="<?php echo $mi_carrito[$i]['nombre'] ?>" />
                        <input name="cantidad" type="hidden" value="<?php echo $mi_carrito[$i]['cantidad'] ?>" />
                        <input name="total" type="hidden" value="<?php echo $subtotal ?>" />
                        <input class="btn-lg btn-default" name="Comprar" type="submit" value="PROCESAR COMPRA" />
                    </form>
                </p>
            </div>
            <p><a href="Catalogo.php">Volver</a></p>
        </div>
    </body>
</html>