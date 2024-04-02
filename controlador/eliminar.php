<?php
if(!empty($_GET["id"]) and !empty($_GET["nombre"])){
    $id=$_GET["id"];
    $nombre=$_GET["nombre"];

    try{
        unlink($nombre);
    }catch(\Throwable $th){

    }

    $eliminar = $conexion -> query("delete from img where id_img=$id");

    if($eliminar == 1){
        echo "<div class='alert alert-success'>EXITO</div>";
    }else{
        echo "<div class='alert alert-danger'>MALO</div>";
    }?>
    <script>
            history.replaceState(null,null,location.pathname)
        </script>
<?php }
?>