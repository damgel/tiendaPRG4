<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ver Productos</title>
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
            .table
            {
                margin-top: 10px;
                width: 100%;
                margin: auto;

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
        </style>
    </head>
    <body>

        <?php include_once 'Includes/header.php'; ?>
        <div class="container">
            <div class="row">
                <div class="acciones">
                    <a href=agregarProducto.php class="btn-default btn-lg">Nuevo Producto</a>
                </div>
                <?php
                include_once 'clases/db_connect.php';

                echo "<table class='table table-bordered table-condensed' >";
                echo "<tr>";
                echo "<td><b>Id</b></td>";
                echo "<td><b>Imagen</b></td>";
                echo "<td><b>Nombre</b></td>";
                echo "<td><b>Descripcion</b></td>";
                echo "<td><b>Categoria</b></td>";
                echo "<td><b>Marca</b></td>";
                echo "<td><b>Precio Venta</b></td>";
                echo "<td><b>Precio Costo</b></td>";
                echo "<td><b>Activo</b></td>";
                echo "<td><b>Mantenimiento</b></td>";
                echo "</tr>";
                $result = mysql_query("SELECT * FROM `producto`") or trigger_error(mysql_error());
                while ($row = mysql_fetch_array($result)) {

                    foreach ($row AS $key => $value) {
                        $row[$key] = stripslashes($value);
                    }
                    $imagen_p = $row['imagen_p'];
                    echo "<tr>";
                    echo "<td valign='top'>" . nl2br($row['id_p']) . "</td>";
                    echo "<td valign='top'>" . "<img  width='75' height='75' src =" . $imagen_p . "/>" . "</td>";
                    echo "<td valign='top'>" . nl2br($row['nombre_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['descripcion_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['categoria_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['marca_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['precio_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['costo_p']) . "</td>";
                    echo "<td valign='top'>" . nl2br($row['activo_p']) . "</td>";
                    echo "<td valign='top'><a href=editarProducto.php?activar={$row['id_p']}>Activar</a><br><a href=editarProducto.php?desactivar={$row['id_p']}>Desactivar</a><br><hr class='divhr'><a href=editarProducto.php?id={$row['id_p']}>Editar</a><br> <a href=eliminarProducto.php?id={$row['id_p']}>Eliminar</a></td> ";
                    echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>



        </div>
    </body>
</html>
