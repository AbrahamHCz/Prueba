
<?php 

    if(!isset($_GET['code'])){
        header('Location: index.php?mssg=error');
        exit();
    }

    include 'model/conexion.php';

    $codigo = $_GET['code'];

    $sentencia = $bd->prepare("DELETE FROM test where code=?;");
    $resultado = $sentencia->execute([$codigo]);

    if($resultado === TRUE){
        header('Location: index.php?mssg=eliminado');
        
    } else{
        header('Location: index.php?mssg=error');
        
    }
    ?>
