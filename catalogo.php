<html>
    <head>
        <title>Catalogo de Productos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <style>
        .id_p
        {

            font-weight: bold;
            text-align: left;
            color: black;
        }
        .grid_carro
        {
            border: solid 1px red;
        }

    </style>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">
            <?
            $columnas = 4; // Definición cantidad de columnas en las que se mostraran los productos de determinada categoría
            include_once 'clases/db_connect.php';
            $m = 0;
            $consultar = mysql_query("SELECT * FROM producto WHERE id_p>$m"); //$_GET['catcod'] = variable a ser pasada por URL
            if ($arregloproducto = mysql_fetch_array($consultar)) {
                echo "<table border='0' ><div class='grid_carro'>";
                echo "<tr>";
                $nCol = 1; // contador de columnas
                do {
                    if ($nCol <= $columnas) {
                        echo "<td>";
                        echo "<table border=0>"; //Se crea una tabla dentro de la celda para mostrar los productos ordenadamente
                        echo "<tr>";
                        echo "<td class='id_p'>" . $arregloproducto['id_p'] . "</td>"; //Idealmente se debe mostrar la imagen del producto en esta celda
                        echo "</tr>";
                        echo "<td>" . "> " . $arregloproducto['nombre_p'] . "</td>";
                        echo "</tr>";
                        echo "<td>" . $arregloproducto['descripcion_p'] . "</td>"; //Idealmente se debe mostrar la imagen del producto en esta celda
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td class='id_p'>" . "$ " . $arregloproducto['precio_p'] . "<input type='submit' value='Agregar al Carrito'>" . "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</td>";
                        $nCol = $nCol + 1;
                        if ($nCol > $columnas) {
                            $nCol = 1;
                            echo "</tr>"; //se cierra la fila actual
                            echo "<tr>"; //se abre una nueva fila			
                        }
                    }
                } while ($arregloproducto = mysql_fetch_array($consultar));
                if ($nCol <= $columnas) { //Si la condición no se cumplió en el ciclo anterior me aseguro de cerrar la Fila que quedo abierta
                    echo "</tr>";
                }
                echo "</div></table>";
            } else {
                echo "No existen Productos disponibles para la categoría seleccionada";
            }
            ?>

        </div> 

        <div class="lista">
            <?php
            $lista_p = array
                (
                "id" => "sdf",
                "id" => "sdf",
                "id" => "sdf",
                "id" => "sdf",
                "id" => "sdf",
                    )
            ?>

        </div>
    </body>
</html>