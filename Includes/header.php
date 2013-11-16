<html> 
    <body> 
        <style>
            body
            {
                margin: 0px;
            }
            .header
            {
                margin-top: 0px;
                padding-top: 0px;
                background: whitesmoke;
                border-bottom: 1px solid #e5e5e5;
                height: 50px;
                width: 100%;
                margin: auto;
            }
            .header ul
            {
                margin: 0px;
            }

            .menu li
            {
                margin-top: 0px;
                margin-bottom: 0px;
                height: 30px;
                list-style: none;
                float: left;
                padding: 10px;
            }
            .menu li:hover
            {
                background: #cccccc;
                background: -moz-linear-gradient(top,  #cccccc 0%, #eeeeee 99%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cccccc), color-stop(99%,#eeeeee));
                background: -webkit-linear-gradient(top,  #cccccc 0%,#eeeeee 99%);
                background: -o-linear-gradient(top,  #cccccc 0%,#eeeeee 99%);
                background: -ms-linear-gradient(top,  #cccccc 0%,#eeeeee 99%);
                background: linear-gradient(to bottom,  #cccccc 0%,#eeeeee 99%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cccccc', endColorstr='#eeeeee',GradientType=0 );

            }
            .menu li a
            {
                padding-top: 30px;
                color: black;
                font-family: Helvetica, Sans Serif, Arial;
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                text-decoration: none;  
            }
            .contenedor
            {
                padding-top: 15px;
                width: 80%;
                margin: auto;
            }
        </style>
        <div class="header">
            <ul class="menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="../administrarProductos.php">Productos</a></li>
                <li><a href="../li-categoria.php">Categorias</a></li>
                <li><a href="../Catalogo.php">VerCatalogo2</a></li>
                <li><a href="../carrito.php">VerCarrito</a></li>
            </ul>
        </div>
    </body> 
</html>