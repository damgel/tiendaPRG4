<?php
include_once 'clases/db_connect.php';
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
    $sql = "INSERT INTO `categorias` ( `nombre_ct` ,  `fecha_ct` ,  `activo_ct`  ) VALUES(  '{$_POST['nombre_ct']}' ,  now() ,  '{$_POST['activo_ct']}'  ) ";
    mysql_query($sql) or die(mysql_error());
    echo "Registro Agregado.<br />";
}


if (isset($_GET['editar'])) {
    $id_ct = (int) $_GET['editar'];
    if (isset($_POST['submitted'])) {
        foreach ($_POST AS $key => $value) {
            $_POST[$key] = mysql_real_escape_string($value);
        }
        $sql = "UPDATE `categorias` SET  `nombre_ct` =  '{$_POST['nombre_ct']}' ,  `fecha_ct` =  now() ,  `activo_ct` =  '{$_POST['activo_ct']}'   WHERE `id_ct` = '$id_ct' ";
        mysql_query($sql) or die(mysql_error());
        echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
        echo "<a href='list.php'>Regresar</a>";
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `categorias` WHERE `id_ct` = '$id_ct' "));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrar Categorias</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <style>
            .container{
                background: white;
                width: 90%;
                display: block;
                height: 100%;
            }
            .row1
            {
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                width: 60%;
                border-spacing: 0; 
                border: solid #05a8ff 1px;
                -moz-border-radius: 6px;
                -webkit-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 1px #05a8ff;
                -moz-box-shadow: 0 1px 1px #05a8ff;
                box-shadow: 0 1px 1px #05a8ff;

            }
            .row
            {
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                width: 100%;
                border-spacing: 0; 
                border: solid #05a8ff 1px;
                -moz-border-radius: 6px;
                -webkit-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 1px #05a8ff;
                -moz-box-shadow: 0 1px 1px #05a8ff;
                box-shadow: 0 1px 1px #05a8ff;

            }
            .sub-row
            {
                margin: 20px;

            }
            legend
            {
                text-decoration:none;
                width: auto;
            }
        </style>
    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="container">
            <fieldset class="row1">
                <legend>Agregar nueva categoria</legend>
                <div class="sub-row">
                    <form action='' method='POST'> 
                        <div><b>Nombre Categoria:</b><br /><input type='text' name='nombre_ct' value='<?= stripslashes($row['nombre_ct']) ?>'required/></div> 
                        <div><b>Activo Categoria:</b><br /><input type='text' name='activo_ct' value='<?= stripslashes($row['activo_ct']) ?>' required/></div><br> 
                        <div><input type='submit' value='Agregar Categoria' /><input type='hidden' value='1' name='submitted' /></div> 
                    </form>  

                </div>
            </fieldset>
            <fieldset  class="row">
                <legend>Lista de categorias</legend>
                <div class="sub-row">
                    <?php
                    include_once 'clases/db_connect.php';

                    echo "<table class='bordered table-bordered table-condensed' >";
                    echo "<tr>";
                    echo "<td><b>Id Ct</b></td>";
                    echo "<td><b>Nombre Ct</b></td>";
                    echo "<td><b>Fecha Ct</b></td>";
                    echo "<td><b>Activo Ct</b></td>";
                    echo "</tr>";
                    $result = mysql_query("SELECT * FROM `categorias`") or trigger_error(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        foreach ($row AS $key => $value) {
                            $row[$key] = stripslashes($value);
                        }
                        echo "<tr>";
                        echo "<td valign='top'>" . nl2br($row['id_ct']) . "</td>";
                        echo "<td valign='top'>" . nl2br($row['nombre_ct']) . "</td>";
                        echo "<td valign='top'>" . nl2br($row['fecha_ct']) . "</td>";
                        echo "<td valign='top'>" . nl2br($row['activo_ct']) . "</td>";
                        echo "<td valign='top'><a href=administrarCategorias.php?editar={$row['id_ct']}>Editar</a></td><td><a href=administrarCategorias.php?eliminar={$row['id_ct']}>Eliminar</a></td> ";
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
            </fieldset>
        </div>
    </body>
</html>
