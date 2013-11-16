<?php
if (($_POST['submit'] = 'Guardar')) {
    $output_dir = "Images/productos/";
    if (isset($_FILES["myfile"])) {
        //Filter the file types , if you want.
        if ($_FILES["myfile"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            //move the uploaded file to uploads folder;
            $filename = basename($_FILES["myfile"]["tmp_name"]);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $new = uniqid() . '.' . $extension;

            move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $new);
//
//            if (move_uploaded_file($_FILES['myfile']['tmp_name'], "/path/{$new}")) {
//                // other code
//            }
            echo "Uploaded File :" . $new;
            $name_ok = $id_unico . $_FILES["myfile"]["name"];
            echo '<br>' . 'El nombre correcto es:' . $output_dir . $new;
        }
    }
}
?>
<!doctype html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <style>
        form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
        #progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        #bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
        #percent { position:absolute; display:inline-block; top:3px; left:48%; }
    </style>
</head>
<body>

    <form id="myForm" action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="submit" value="Guardar">
    </form>


    <div id="progress">
        <div id="bar"></div>
        <div id="percent">0%</div >
    </div>
    <br/>

    <div id="message"></div>


    <script>
        $(document).ready(function()
        {

            var options = {
                beforeSend: function()
                {
                    $("#progress").show();
                    //clear everything
                    $("#bar").width('0%');
                    $("#message").html("");
                    $("#percent").html("0%");
                },
                uploadProgress: function(event, position, total, percentComplete)
                {
                    $("#bar").width(percentComplete + '%');
                    $("#percent").html(percentComplete + '%');


                },
                success: function()
                {
                    $("#bar").width('100%');
                    $("#percent").html('100%');

                },
                complete: function(response)
                {
                    $("#message").html("<font color='green'>" + response.responseText + "</font>");
                },
                error: function()
                {
                    $("#message").html("<font color='red'> ERROR: unable to upload files</font>");

                }

            };

            $("#myForm").ajaxForm(options);

        });

    </script>
</body>


</html>