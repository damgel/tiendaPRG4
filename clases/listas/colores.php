

<?php

/*
 * Código para mostrar datos dinámicamente en un combobox.
 */
include_once '../../clases/db_connect.php';

//echo '<select>';
$s = '"S"';
$result = mysql_query("SELECT id_cl, nombre_cl FROM `colores` where activo_cl=$s order by nombre_cl ASC") or trigger_error(mysql_error());
while ($row = mysql_fetch_array($result)) {
    foreach ($row AS $key => $value) {
        $row[$key] = stripslashes($value);
    }
    echo "<option";
    $value = $row['nombre_cl'];
    echo " value=$value>" . nl2br($row['nombre_cl']);
    echo "</option>";
}
//echo "</select";
?>
