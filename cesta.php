<?php
session_start();
include_once 'clases/db_connect.php';
?>
<?php
if (isset($_POST['id_txt'])) {
    $evalSubmit = $_POST['id_txt'];
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
    $usuario = $_SESSION['userid'];
    $sub_total = $_POST['precio'] * $_POST['cantidad'];
    $sql = "INSERT INTO `carrito` (`id_p` ,  `id_u` ,  `id_orden` ,  `nombre` ,  `precio` ,  `cantidad` ,  `subtotal`  ) VALUES('{$_POST['id_txt']}' ,  $usuario ,  '{$_POST['id_orden']}' ,  '{$_POST['nombre']}' ,  '{$_POST['precio']}' ,  '{$_POST['cantidad']}' ,  $sub_total  ) ";
    mysql_query($sql) or die(mysql_error());
    echo "Producto Agregado al .<br />";
    $evalSubmit = 0;
}
if (isset($_GET['q'])) {
    $eliminar_item = (int) $_GET['q'];
    mysql_query("DELETE FROM `carrito` WHERE `idcarrito` = '$eliminar_item' ");
    echo 'PRODUCTO ELIMINADO<br>';
}
?>
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

    </style>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">


            <?php
            include_once 'clases/db_connect.php';
            echo "<table class='table table-bordered table-condensed'>";

            echo "<tr>";
            //echo "<td><b>Idcarrito</b></td>";
            //echo "<td><b>Id P</b></td>";
            //echo "<td><b>Id U</b></td>";
            echo "<td><b>Id Orden</b></td>";
            echo "<td><b>Producto</b></td>";
            echo "<td><b>Precio</b></td>";
            echo "<td><b>Cantidad</b></td>";
            echo "<td><b>Subtotal</b></td>";
            echo "<td><b>Items</b></td>";
            echo "</tr>";

            $usuario = $_SESSION['userid'];
            $result = mysql_query("SELECT id_orden, nombre, precio, sum(cantidad) as cantidad, sum(subtotal) as subtotal FROM `carrito` where id_u=$usuario group by nombre") or trigger_error(mysql_error());
            while ($row = mysql_fetch_array($result)) {
                foreach ($row AS $key => $value) {
                    $row[$key] = stripslashes($value);
                }
                echo "<tr>";
                // echo "<td valign='top'>" . nl2br($row['idcarrito']) . "</td>";
                //echo "<td valign='top'>" . nl2br($row['id_p']) . "</td>";
                //echo "<td valign='top'>" . nl2br($row['id_u']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['id_orden']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['nombre']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['precio']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['cantidad']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['subtotal']) . "</td>";
                echo "<td valign='top'><a href=cesta.php?q={$row['idcarrito']}>Quitar Item</a></td> ";
                echo "</tr>";

            }
            echo "</table>";
            ?>

        </div>
        <p><a href="index.php">Volver</a></p>
    </div>
</body>
</html>