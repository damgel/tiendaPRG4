<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Perfil</title>
    </head>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/jquery-v1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  
      <link rel="stylesheet" href="assets/css/bootstrap.css">
     <script src="assets/js/holder.js"></script>
    <style>
        fieldset
        {
            background-color: white;
            border:solid 1px #CCC;
            margin: 25px;
            padding: 25px;
        }
    </style>
    <body>
    
    
    
    
    
    
        <?php include_once 'Includes/header.php'; ?>
        <div class="contenedor">

            <?
            include_once "clases/db_connect.php";
            session_start();


//            echo "PRUEBA" . $idcliente;
            if (($_SESSION['userid']) !== "") {
                $idcliente = $_SESSION['userid'];
                if (isset($_POST['submitted'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    $sql = "UPDATE `cliente` SET  `nombre` =  '{$_POST['nombre']}' ,  `apellido` =  '{$_POST['apellido']}' ,  `usuario` =  '{$_POST['usuario']}' ,  `contrasenia` =  '{$_POST['contrasenia']}' ,  `fecha_nac` =  '{$_POST['fecha_nac']}' ,  `correo` =  '{$_POST['correo']}' ,  `tel` =  '{$_POST['tel']}'   WHERE `idcliente` = '$idcliente' ";
                    mysql_query($sql) or die(mysql_error());
                    echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
                    echo "<a href='list.php'>Regresar</a>";
                }
                $row = mysql_fetch_array(mysql_query("SELECT * FROM `cliente` WHERE `idcliente` = '$idcliente' "));
                ?>




<div class="jumbotron">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#Perfil">Perfil</a></li>
                        <li class=""><a href="#Historial de compras">Historial de compras</a></li>
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="Perfil">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                
                                
                                
                                
                                    <form action='' method='POST'> 
                    <fieldset>
                        <div><b>Nombre:</b><br /><input type='text' name='nombre' value='<?= stripslashes($row['nombre']) ?>' /></div> 
                        <div><b>Apellido:</b><br /><input type='text' name='apellido' value='<?= stripslashes($row['apellido']) ?>' /></div> 
                        <div><b>Usuario:</b><br /><input type='text' name='usuario' value='<?= stripslashes($row['usuario']) ?>' /></div> 
                        <div><b>Contrasenia:</b><br /><input type='text' name='contrasenia' value=""/></div> 
                        <div><b>Fecha Nac:</b><br /><input type='text' name='fecha_nac' value='<?= stripslashes($row['fecha_nac']) ?>' /></div> 
                        <div><b>Correo:</b><br /><input type='text' name='correo' value='<?= stripslashes($row['correo']) ?>' /></div> 
                        <div><b>Tel:</b><br /><input type='text' name='tel' value='<?= stripslashes($row['tel']) ?>' /></div> 
                        <div><input type='submit' value='Guardar Cambios' /><input type='hidden' value='1' name='submitted' /></div> 
                    </fieldset>
                </form> 
            <? } ?> 
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="Historial de compras">

                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Historial de compras</h1>
                                    
                                    
                                    
                                    
                                    
                                    ............................
                                </div>
                            </div> 
                        </div>

                    </div>

                    <script>
                        $('#myTab a').click(function(e) {
                            e.preventDefault();
                            $(this).tab('show');
                        });
                    </script>

                </div>










                

        </div>
    </body>
</html>