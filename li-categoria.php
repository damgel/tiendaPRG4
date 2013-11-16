
<style>
    .categorias_ul
    {
        margin: 0px;
    }
    .categorias_li
    {
        display: block;
        list-style: none;
        float: left;
        padding-left: 10px;
        text-decoration: none;
        text-align: center;

    }
    .categorias_li a
    {
        color: black;

    }
    .categorias_li a:hover
    {
        color: #00529b;
        font-weight: bold;
    }
    .categorias_li a:link
    {
        text-decoration: none;
    }
</style>
<ul class="categorias_ul">
    <?php
    /*
     * Código para mostrar datos dinámicamente en un combobox.
     */
    include_once 'clases/db_connect.php';
// inicia la lista
    $s = '"S"';
    $result = mysql_query("SELECT id_ct, nombre_ct FROM `categorias` where activo_ct=$s order by nombre_ct ASC") or trigger_error(mysql_error());
    while ($row = mysql_fetch_array($result)) {
        foreach ($row AS $key => $value) {
            $row[$key] = stripslashes($value);
        }
        // $value = $row['nombre_ct'];
        echo "<li class='categorias_li'";
        echo "><a class'categorias_a' href=http://localhost:8001/Catalogo.php?id={$row['nombre_ct']}>" . nl2br($row['nombre_ct']);
        echo "</a></li>";
    }
//echo     <a href=http://localhost:8001/principal2.php?categoria={$row['id_p']}>Editar</a>
    ?>
</ul>

