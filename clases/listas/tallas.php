

<?php

/*
 * Código para mostrar datos dinámicamente en un combobox.
 */
include_once '../../clases/db_connect.php';

//echo '<select>';
$s = '"S"';
$result = mysql_query("SELECT id_ta, nombre_ta FROM `tallas` where activo_ta=$s order by id_ta ASC") or trigger_error(mysql_error());
while ($row = mysql_fetch_array($result)) {
    foreach ($row AS $key => $value) {
        $row[$key] = stripslashes($value);
    }
    echo "<option";
    $value = $row['nombre_ta'];
    echo " value=$value>" . nl2br($row['nombre_ta']);
    echo "</option>";
}
//echo "</select";
?>
