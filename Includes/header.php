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
                height: 30px;
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
                padding: 5px;
            }
            .menu li:hover
            {

                border-bottom: solid 2px #0051ff;
                height: 20px;
                padding: 5px;
                background: white;

            }
            .menu li a
            {
                padding: 0px;
                font-family: Helvetica, Sans Serif, Arial;
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                text-decoration: none;  
            }
            .menu li a:hover
            {
                color: #ccc;
            }
            .contenedor
            {
                padding-top: 15px;
                width: 80%;
                margin: auto;
            }
            .right-login
            {
                font-size: 16px;
                font-weight: bold;
                display: block;
                padding-top: 10px;
                margin-left: 75%;
                padding-left: 10%;

            }
        </style>
        <div class="header">
            <ul class="menu">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../cesta.php">Carrito de compras</a></li>
                <li><a href="../admin/administrarProductos.php">Panel Administrativo</a></li>
            </ul>
            <div class="right-login">
                <?php
                session_start();
                $urlactual = $_SERVER['REQUEST_URI'];
                if (!empty($_SESSION['username'])) {
                    $nombre = $_SESSION['username'];
                    echo "$nombre";
                    echo '<a href="../logoff.php" class="logout"><span class="glyphicon glyphicon-log-out"></span> Cerra Sesion</a>';
                    //echo "<script>alert('$urlactual')</script>";
                }  else {
                    header("Location: logon.php"); /* Redirect browser */
                }
                ?>
            </div>
        </div>
    </body>
</html>