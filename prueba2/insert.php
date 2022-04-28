<?php
    // print_r($_POST);
    if( empty($_POST["addA"]) || empty($_POST["addB"])){
        header('Location: index.php?mssg=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $enviarA = $_POST["addA"];
    $enviarB = $_POST["addB"];

    $sentencia = $bd->prepare("INSERT INTO test(a,b) VALUES (?,?);");
    $resultado = $sentencia->execute([$enviarA,$enviarB]);

    if($resultado === TRUE){
        header('Location: index.php?mssg=registrado');
    } else {
        header('Location: index.php?mssg=error');
        exit();
    }
?>