
<?php

/*
 * Código para mostrar datos dinámicamente en un combobox.
 */
include_once '../../clases/db_connect.php';
//echo "<select><option value=>- Seleccione -</option>";
$s = '"S"';
$result = mysql_query("SELECT id_ct, nombre_ct FROM `categorias` where activo_ct=$s order by nombre_ct ASC") or trigger_error(mysql_error());
while ($row = mysql_fetch_array($result)) {
    foreach ($row AS $key => $value) {
        $row[$key] = stripslashes($value);
    }
    echo "<option";
    $value = $row['nombre_ct'];
    echo " value=$value>" . nl2br($row['nombre_ct']);
    echo "</option>";
}
//echo "</select";
?>