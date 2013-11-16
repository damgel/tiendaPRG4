<?php include_once 'clases/db_connect.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Catalogo de productos</title>
        <style type="text/css">
            /* General  
 ----------------------------------------------------------*/
            html {
                margin: 0;
                padding: 0;
            }
            h1
            {
                text-align: left;
            }
            h3
            {
                text-align: right;
                font-size: 16px;
            }


            header, footer, hgroup,
            nav, section {
                display: block;
            }

            body {
                background: #fff url(../Images/bkg.png) repeat-x top left;
                color: #696969;
                font-family: Tahoma, Verdana, Helvetica, Sans-Serif;
                font-size: .75em;
                margin: 0;
                padding: 0;
            }

            a:link {
                color: #3b3420;
                text-decoration: none;
            }

            a:visited {
                color: #3b3420;
                text-decoration: none;
            }

            a:hover {
                color: #3399ff;
                text-decoration: none;
            }

            a:active {
                color: #a52f09;
            }

            input[type=text]
            {

                border: solid 1px #3399ff;
                padding-left: 10px;
                font-size: 20px;
                height: 30px;
                width: 40%;
            }

            input[type=submit] {
                width: 25%;
                height: 40px;
                padding: 0;
                font-size: 18px;
                color: white;
                text-align: center;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
                background: #2980b9;
                border: 0;
                border-bottom: 2px solid #2475ab;
                cursor: pointer;
                -webkit-box-shadow: inset 0 -2px #2475ab;
                box-shadow: inset 0 -2px #2475ab;
            }
            input[type=submit]:hover
            {
                background: #3399ff;

            }

            /* Basic Layout
            ----------------------------------------------------------*/
            #page {
                margin: 0 auto;
                width: 960px;
            }

            header {
                height: 80px;
            }

            #body, footer {
                border-top: 1px dotted #5d5a53;
                clear: both;
            }

            #footer {
                padding: 10px;
                text-align: center;
            }

            div#sidebar {
                float: right;
                margin:10px 0px 10px 30px;
                width: 27%;
            }

            section#main {
                float: left;
                width: 65%;
            }
            .contenedor
            {
                width: 80%;
                margin: auto;
            }

            /* Menu
            ----------------------------------------------------------*/
            nav ul {
                float: right;
                font-size: 1.4em;
                list-style: none;
                margin: 50px 0 0 0;
            }

            nav ul li {
                float: left;
                margin-left: 30px;
            }

            .site-title a {
                background: transparent url(../Images/brand.png) no-repeat;
                float: left;
                height: 50px;
                margin: 15px;
                padding: 0;
                text-indent: -9999px;
                width: 340px;
            }

            /* Featured Product
            ----------------------------------------------------------*/
            div#featuredProduct {
                background-color: #fdfcf7;
                border: 4px solid #e6e3d8;
                height: 300px;
                margin: 20px auto;
                width: 920px;

                /*CSS3 properties*/
                border-radius: 6px;
                -moz-border-radius: 6px;
                -webkit-border-radius: 6px;
                box-shadow: 0px 2px 5px #888;
                -webkit-box-shadow: 0px 2px 5px #888;
                -moz-box-shadow: 0px 2px 5px #888;
            }

            div#featuredProduct img {
                float: left;

                /*CSS3 properties*/
                border-radius: 3px 0px 0px 3px;
                -moz-border-radius: 3px 0px 0px 3px;
                -webkit-border-radius: 3px 0px 0px 3px;
            }

            #featuredProductInfo {
                float: right;
                height: 100%;
                padding: 0 10px;
                width: 230px;
            }

            #productInfo {
                height: 250px;
                overflow: auto;
            }

            #productInfo h2 {
                font-size: 2.5em;
                font-weight: normal;
                margin: 5px 0;
            }

            #productInfo .description {
                font-size: 1.2em;
                margin: 0;
            }

            #productInfo .price {
                font-size: 1.75em;
                margin: 5px 0;
            }

            #callToAction a.order-button {
                font-size: 2em;
                padding: 5px 0;
                text-align:center;
                width: 100%;
            }

            /* Products
            ----------------------------------------------------------*/
            #products {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .product {
                float: left;
                margin: 10px 12px;
                width: 215px;
            }

            .product .productInfo {
                height: 300px;
                overflow: hidden;
            }

            .product h3 {
                font-size: 1.65em;
                font-weight: normal;
                margin: 0 0 5px 0;
                padding: 0;
            }

            .product-image {
                background-color: #edece8;
                border: 1px #e6e3d8 solid;
                height: 200px;
                margin: 0 0 7px 0;
                padding: 6px;
                width: 200px;
            }

            .hide-from-desktop
            {
                /* Only for mobile devices */
                display: none;
            }

            .product .description {
                margin: 0;
            }

            .product .price {
                float: left;
                font-size: 1.5em;
                margin: 0;
            }

            .product input[type=submit] {
                float: right;
                padding: 2px 7px;
            }

            form .order-button {

                width: 65%;
                height: 30px;
                padding: 0;
                font-size: 14px;
                color: white;
                text-align: center;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
                background: #27ae60;
                border: 0;
                border-bottom: 2px solid #219d55;
                cursor: pointer;
                -webkit-box-shadow: inset 0 -2px #219d55;
                box-shadow: inset 0 -2px #219d55;

            }

            form .order-button:hover {
                background: #2CE67A;

                outline: none;
                -webkit-box-shadow: none;
                box-shadow: none;


            }

            /* Forms   
            ----------------------------------------------------------*/
            fieldset {
                border: 1px solid #CCC;
                margin: 1em 0;
                padding: 1em;
            }

            fieldset legend {
                font-size: 1.1em;
                font-weight: bold;
                padding: 2px 4px 8px 4px;
            }

            fieldset ol {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            fieldset ol li {
                padding-bottom: 5px;
            }

            fieldset label {
                display: block;
                font-size: 1.2em;
                margin-bottom: 3px;
            }

            fieldset label:after {
                content: ":";
            }

            fieldset label.checkbox {
                display: inline;
            }

            fieldset input[type="text"], input[type="password"] {
                border: 1px solid #ccc;
                color: #444;
                font-size: 1.2em;
                padding: 2px;
                width: 300px;
            }

            fieldset input[type="submit"] {
                padding: 5px;
            }

            fieldset textarea {
                color: #444;
                width: 300px;
            }

            .no-legend {
                border: none;
                padding: 0;
            }

            .no-legend legend {
                display: none;
            }

            /* Order   
            ----------------------------------------------------------*/
            .quantity label {
                display: inline;
            }

            .quantity input[type=text] {
                width: 30px;
            }

            #orderTotal {
                font-weight: bold;
            }

            .order-image {
                float: left;
                margin: 10px 30px 10px 0px;
            }

            .order-success {
                background: #edece8;
                color: #696969;
            }

            .order-success h2 {
                margin: 0;
            }


            #orderProcess {
                list-style: none;
                padding: 0;
                clear: both;
            }

            #orderProcess li {
                color: #696969;
                display: inline;
                font-size: 1.2em;
                margin-right: 15px;
                padding: 3px 0px 0px 5px;
            }

            .step-number {
                background-color: #edece8;
                border: 1px solid #e6e4d9;
                font-size: 1.5em;
                margin-right: 5px;
                padding: 3px 10px;
            }

            .current .step-number {
                background-color: #a52f09;
                border-color: #712107;
                color: #fefefe;
            }


            /* Information and errors  
            ----------------------------------------------------------*/  
            .message {
                border: 1px solid;
                clear: both;
                margin: 10px 0px;
                padding: 15px 15px;

                /*CSS3 properties*/
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                box-shadow: 2px 2px 5px #888;
                -webkit-box-shadow: 2px 2px 5px #888;
                -moz-box-shadow: 2px 2px 5px #888;
            }

            .info {
                background: #bde5f8;
                color: #00529b;
            }

            .error {
                background: #ffccba;
                color: #d63301;
            }

            .field-validation-error {
                color: #be3e16;
                font-weight: bold;
            }

            .field-validation-error:before {
                content: "«";
                margin:0 3px;
            }

            .validation-summary-errors {
                color: #be3e16;
                font-size: 1.2em;
                font-weight: bold;
            }

            .validation-summary-errors ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .validation-summary-valid {
                display: none;
            }

            .field-validation-valid {
                display: none;
            }
            .buscador
            {
                margin-bottom: 10px;
            }
            .lbl-buscar
            {
                font-family: Helvetica, Arial;
                font-size: 24px;
                font-weight: bold;
            }
            .titulos
            {
                padding: 10px;
                margin: auto;
                width: 80%;
            }

        </style>
    </head>
    <body>

        <div class="contenedor">
            <div class="titulos">
                <?php include_once 'li-categoria.php'; ?>
                <br></br><h1><a href="principal2.php">Super Tienda</a></h1><h3><a href="carrito.php">Ver Carrito</a></h3>
            </div>
            <div class="buscador">
                <hr></hr>
                <form id="form1" name="form1" method="post" action="">
                    <div>
                        <label for="buscar" class="lbl-buscar">Buscar:</label>
                        <input type="text" name="buscar" id="buscar" /></td>
                        <input type="submit" name="Aceptar" id="Aceptar" value="Buscar" />
                    </div>
                </form>
            </div>

            <?php
            /* Un id único, como: 4b3403665fea6 */
            /* printf("NombreUnico: %s\r\n", uniqid()); */
            $consulta = mysql_query("select * from producto where activo_p='S'");
            if (isset($_POST['buscar'])) {
                $consulta = mysql_query("select * from producto where nombre_p like '%" . $_POST['buscar'] . "%'");
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $consulta = mysql_query("select * from producto where categoria_p like '%" . $id . "%'");
            }
            if ((mysql_num_rows($consulta)) === 0) {
                echo "<h1>Producto no encontrado! :'(</h1>";
                echo "<h2><a href='principal2.php'>Regresar</a></h2>";
            } else {
                while ($filas = mysql_fetch_array($consulta)) {
                    $id = $filas['id_p'];
                    $imagen = $filas['imagen_p'];
                    $nombre = $filas['nombre_p'];
                    $desc = $filas['descripcion_p'];
                    $precio = $filas['precio_p'];
                    $enStock = $filas['existencia_p'];
                    $fecha = $filas['fecha_p'];
                    ?>
                    <div id="productsWrapper">
                        <ul id="products" data-role="listview" data-inset="true">
                            <li class="product">

                                <img class="hide-from-desktop" src="<?php echo $imagen; ?>" alt="Imagen de @p.Name" />

                                <div class="productInfo">
                                    <h3><?php echo $nombre ?></h3>
                                    <img class="product-image hide-from-mobile" src="<?php echo $imagen; ?>" alt="Imagen de <?php echo $nombre ?>" />
                                    <p class="description"><?php echo $desc ?></p>
                                    <p class="price hide-from-desktop"><?php echo $precio ?></p>                    
                                </div>

                                <!-- Desktop only -->
                                <div class="action  hide-from-mobile">
                                    <p class="price"><?php echo "$" . $precio ?></p>
                                    <p>
                                        <form action="carrito.php" method="post" name="compra">
                                            <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
                                            <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                                            <input name="precio" type="hidden" value="<?php echo $precio ?>" />
                                            <input name="cantidad" type="hidden" value="1" />
                                            <input class="order-button" name="Comprar" type="submit" value="Agregar al carrito" />
                                        </form>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </body>
</html>