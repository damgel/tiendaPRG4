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