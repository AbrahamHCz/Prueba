<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>

<?php

    if(!isset($_GET['code'])){
        header('Location: index.php?mssg=error');
    }
        include_once 'model/conexion.php';

        $codigo = $_GET['code'];
        
        $sentencia = $bd->prepare("select * from test where code = ?;");
        $sentencia->execute([$codigo]);

        $tickets = $sentencia->fetch(PDO::FETCH_OBJ);
        // print_r($tickets);

?>


<div class="container col-md-4">
<form action="editarProceso.php" class="p-4" method="POST">
    <div class="modal-body">
        <!--form -->
        <input type="hidden" name="codigo" value="<?php echo $tickets->code ?>">
        <div class="mb-3">
            <label class="form-label">Ingresa el nuevo valor de 'a'</label>
            <input type="number" class="form-control" name="addA" maxlength="3" require value="<?php echo $tickets->a ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Ingresa el nuevo valor de 'b'</label>
            <input type="text" class="form-control" name="addB" maxlength="3" require value="<?php echo $tickets->b ?>">
        </div>
    </div>
    <div class="modal-footer">
        <a href="index.php" class="btn btn-dark">Cancel</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
<form>
</div>