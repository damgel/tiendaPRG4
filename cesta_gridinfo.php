<?php

//SUMA DE LOS PRODUCTOS Y TOTAL A PAGAR EN EL PIE DEL GRID CARRITO
if (!empty($_SESSION['username'])) {
    $id_usuario = $_SESSION['userid'];
    $query = "SELECT round(sum(cantidad),0) as cantidad, round(sum(subtotal),2) FROM carrito where id_u=$id_usuario";
    $result = mysql_query($query) or die(mysql_error());
    $nombre = $_SESSION['username'];
    while ($row = mysql_fetch_array($result)) {
        $_SESSION['cantidad_productos'] = $row['cantidad'];
        $cantidad_p = $_SESSION['cantidad_productos'];
        echo "<p class='total'>Total a pagar " . " : <b>$ " . $row['round(sum(subtotal),2)'] . "</b></p>";
        echo "<p class='total'>Productos " . " : <b> " . $row['cantidad'] . "</b></p>";
        echo "<br />";
    }
} else {
    echo "<p class='total'> <b> " . "Necesitas registrarte para poder comprar</b></p>";
}
?>