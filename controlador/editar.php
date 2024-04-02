<?php
    if(!empty($_POST["btneditar"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];

        //datos de la img

        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombreImagen = $_FILES["imagen"]["name"];
        $tipoImagen=strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
        $directorio = "archivos/";

        if(is_file($imagen)){
            if($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png"){
                try{
                    unlink($nombre);
                }catch(\Throwable $th){

                }
                $ruta=$directorio.$id.".".$tipoImagen;
                if(move_uploaded_file($imagen,$ruta)){
                    $editar = $conexion->query("update img set foto='$ruta' where id_img=$id");

                    if($editar==1){
                        echo "<div class='alert alert-success'>EXITO</div>";
                    }else{
                        echo "<div class='alert alert-danger'>ERROR AL EDITAR LA IMG</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>ERROR AL SUBIR</div>";
                }   
            }else{
                echo "<div class='alert alert-danger'>FORMATO NO VALIDO</div>";
            }
        }else{
            echo "<div class='alert alert-info'>SELECCIONA UNA IMG</div>";
        } ?>
        <script>
            history.replaceState(null,null,location.pathname)
        </script>
    <?php }
    ?>

