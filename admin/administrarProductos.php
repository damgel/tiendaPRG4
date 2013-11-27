<?php include_once 'Includes/session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrar Productos</title>
        <link href="../assets/css/main.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <script src="../assets/js/jquery-v1.10.2.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <style>
            .container{
                background: white;
                width: 90%;
                display: block;
                height: 100%;
            }
            .row
            {
                margin: auto;
                margin-top: 10px;

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
            .table
            {
                margin-top: 10px;
                width: 100%;
                margin: auto;


            }
            table
            {
                *border-collapse: collapse; /* IE7 and lower */
                border-spacing: 0; 
                border: solid #ccc 1px;
                -moz-border-radius: 6px;
                -webkit-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 1px #ccc;
                -moz-box-shadow: 0 1px 1px #ccc;
                box-shadow: 0 1px 1px #ccc;


            }
            .acciones
            {
                border-bottom: solid 2px #05a8ff;
                display: block;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .divhr
            {
                padding: 0;
                margin: 2px;
            }

            th:first-child {
                -moz-border-radius: 6px 0 0 0;
                -webkit-border-radius: 6px 0 0 0;
                border-radius: 6px 0 0 0;
            }

            th:last-child {
                -moz-border-radius: 0 6px 0 0;
                -webkit-border-radius: 0 6px 0 0;
                border-radius: 0 6px 0 0;
            }

            th:only-child{
                -moz-border-radius: 6px 6px 0 0;
                -webkit-border-radius: 6px 6px 0 0;
                border-radius: 6px 6px 0 0;
            }
            .bordered tr:hover
            {
                background: #fbf8e9;
                -o-transition: all 0.1s ease-in-out;
                -webkit-transition: all 0.1s ease-in-out;
                -moz-transition: all 0.1s ease-in-out;
                -ms-transition: all 0.1s ease-in-out;
                transition: all 0.1s ease-in-out;     
            } 
        </style>
    </head>
    <body>

        <?php include_once '../Includes/header.php'; ?>
        <div class="container">
            <div class="row">
                <div class="acciones">
                    <a href=agregarProducto.php class="btn-default btn-lg">Nuevo Producto</a>
                </div>
                <?php
                include_once '../clases/db_connect.php';

                echo "<table class='bordered table-bordered table-condensed' >";
                echo "<tr>";
                echo "<td><b>Id</b></td>";
                echo "<td><b>Imagen</b></td>";
                echo "<td><b>Nombre</b></td>";
                echo "<td><b>Descripcion</b></td>";
                echo "<td><b>Categoria</b></td>";
                echo "<td><b>Marca</b></td>";
                echo "<td><b>Precio Venta</b></td>";
                echo "<td><b>Precio Costo</b></td>";
                echo "<td><b>Color</b></td>";
                echo "<td><b>Tamanio</b></td>";
                echo "<td><b>Activo</b></td>";
                echo "<td><b>Mantenimiento</b></td>";
                echo "</tr>";
                $result = mysql_query("SELECT * FROM `producto`") or trigger_error(mysql_error());
                while ($row = mysql_fetch_array($result)) {

                    foreach ($row AS $key => $value) {
                        $row[$key] = stripslashes($value);
                    }
                    $imagen_p = $row['imagen_p'];
                    echo "<tr class='trover'>";
                    echo "<td valign='top'>" . nl2br($row['id_p']) . "</td>";
                    echo "<td valign='top'>" . "<img  width='75' height='75' src =" . '../' . $imagen_p . "/>" . "</td>";
                    echo "<td valign='top'>" . nl2br($row['nombre_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['descripcion_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['categoria_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['marca_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['precio_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['costo_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['color_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['tamanio_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['activo_p']) . "</td>";
                    echo "<td valign='top'><a href=editarProducto.php?activar={$row['id_p']}>Activar</a><br><a href=editarProducto.php?desactivar={$row['id_p']}>Desactivar</a><br><hr class='divhr'><a href=editarProducto.php?id={$row['id_p']}>Editar</a><br> <a href=editarProducto.php?eliminar={$row['id_p']}>Eliminar</a></td> ";
                    echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>
            <div class="royalties">
                <style>
                    .royalties
                    {
                        margin: auto;
                        margin-top: 10px;
                        margin-bottom: 10px;
                        padding: 10px;
                        border:solid 1px black;
                        height: 100px;
                        width: 90%;
                    }
                </style>
                <?php include_once 'counts_productos.php'; ?>
            </div>

        </div>
    </body>
</html>
