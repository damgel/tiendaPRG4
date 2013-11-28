<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro Requerido</title>
        <link rel="stylesheet" href="assets/css/catalogo.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <style>
            h1
            {
                font-size: 24px;
                color: green;
                text-align: center;
            }
            #ainfo
            {

                margin: 25px;
                padding: 25px;
                font-size: 18px;
                font-weight: bold;
                color: #0099FF;
                text-align: center;
            }
            .contenedor-index
            {
                margin-top: 25px;
                padding: 25px;
            }


        </style>
    </head>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor-index">
            <h1>PARA EFECTUAR UNA COMPRA NECESITAS REGISTRARTE!</h1>
            <a id="ainfo" href="registrocliente.php">Registrarme Ahora!</a>
        </div>
    </body>
</html>
