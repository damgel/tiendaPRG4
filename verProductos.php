<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ver Productos</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="contenedor">
            <?php
            include_once 'clases/db_connect.php';
            echo "<table border=1 >";
            echo "<tr>";
            echo "<td><b>Codigo</b></td>";
            echo "<td><b>Nombre P</b></td>";
            echo "<td><b>Descripcion P</b></td>";
            echo "<td><b>Categoria P</b></td>";
            echo "<td><b>Precio P</b></td>";
            echo "<td><b>Activo P</b></td>";
            echo "<td><b>Imagen P</b></td>";
            echo "</tr>";
            $result = mysql_query("SELECT * FROM `producto`") or trigger_error(mysql_error());
            while ($row = mysql_fetch_array($result)) {
                foreach ($row AS $key => $value) {
                    $row[$key] = stripslashes($value);
                }
                echo "<tr>";
                echo "<td valign='top'>" . nl2br($row['id_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['nombre_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['descripcion_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['categoria_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['precio_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['activo_p']) . "</td>";
                echo "<td valign='top'>" . nl2br($row['imagen_p']) . "</td>";

                echo "</tr>";
            }
            echo "</table>";
            echo "<a href=agregarProducto.php>Nuevo Producto</a>";
            ?>
        </div>
    </body>
</html>
