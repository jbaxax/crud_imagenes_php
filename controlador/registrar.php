<?php
    if(!empty($_POST["btnregistrar"])){
        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombreImagen = $_FILES["imagen"]["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
        $sizeImagen=$_FILES["imagen"]["size"];
        $directorio = "archivos/";
         
        if($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png"){

            
            $registro=$conexion->query("insert into img(foto) values('')");
            $idRegistro=$conexion->insert_id;
            $ruta = $directorio.$idRegistro.".".$tipoImagen;
            $actualizarImagen= $conexion->query("update img set foto='$ruta' where id_img=$idRegistro");

            //ALMACENADO LA IMG

            if(move_uploaded_file($imagen,$ruta)){
                echo "<div class='alert alert-success'>OK</div>";
            }else{
                echo "<div class='alert alert-danger'>MALO</div>";
            }
        }else{
            echo "<div class='alert alert-info'>No se acepta ese formato</div>";
        }?>

        <script>
            history.replaceState(null,null,location.pathname)
        </script>
    <?php }
?>