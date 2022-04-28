<?php



    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mssg=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $enviarA = $_POST["addA"];
    $enviarB = $_POST["addB"];

    $sentencia = $bd->prepare("UPDATE test SET a = ?, b = ? WHERE code = ?;");
    $resultado = $sentencia->execute([$enviarA, $enviarB, $codigo]);

    if($resultado === TRUE) {
        header('Location: index.php?mssg=editado');

    }   else{
        header('Location: index.php?mssg=error');
        exit();
    } 
?>