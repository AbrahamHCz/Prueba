<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>


<?php
include_once 'model/conexion.php';
$sentencia = $bd->query("select * from test");
$ticket = $sentencia->fetchAll(PDO::FETCH_OBJ);

// 
?>


<div class="container">
    <div class="row">
        <p class="display-5">TABLE TEST</p>
    </div>
</div>

<?php
if (isset($_GET['mssg']) and $_GET['mssg'] == 'falta') {
?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Por favor llena todos los campos.
            <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="location.href='http://localhost/prueba/prueba2/index.php'"></input></input>
        </div>
    </div>

<?php
}
?>

<?php
if (isset($_GET['mssg']) and $_GET['mssg'] == 'registrado') {
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se creo el ticket.
            <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="location.href='http://localhost/prueba/prueba2/index.php'"></input></input>
        </div>
    </div>

<?php
}
?>

<?php
if (isset($_GET['mssg']) and $_GET['mssg'] == 'error') {
?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ha ocurrido un error!</strong> Por favor verifica los datos.
            <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="location.href='http://localhost/prueba/prueba2/index.php'"></input></input>
        </div>
    </div>

<?php
}
?>

<?php
if (isset($_GET['mssg']) and $_GET['mssg'] == 'editado') {
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Datos modificados!</strong> Se han guardado los nuevos valores del ticket.
            <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="location.href='http://localhost/prueba/prueba2/index.php'"></input></input>
        </div>
    </div>

<?php
}
?>

<?php
if (isset($_GET['mssg']) and $_GET['mssg'] == 'eliminado') {
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ticket eliminado!</strong> Se ha eliminado el ticket satisfactoriamente.
            <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="location.href='http://localhost/prueba/prueba2/index.php'"></input></input>
        </div>
    </div>

<?php
}
?>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="insert.php" class="p-4" method="POST">
                <div class="modal-body">
                    <!--form -->
                    <input type="hidden" name="codigo">
                    <div class="mb-3">
                        <label class="form-label">Ingresa 'a'</label>
                        <input type="number" class="form-control" name="addA" maxlength="3" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingresa 'b'</label>
                        <input type="text" class="form-control" name="addB" maxlength="3" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
                <form>
        </div>
    </div>
</div>

<div class="container py-5">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal" id="Crear">
                    Crear ticket
                </button>
            </tr>
            </tr>
            <tr>
            <tr>
                <th scope="col">code</th>
                <th scope="col">a</th>
                <th scope="col">b</th>
                <th class="text-center" colspan="2">Opciones</th>
            </tr>

            <?php
            foreach ($ticket as $dato) {

            ?>
                <tr>
                    <td><?php echo $dato->code; ?></td>
                    <td><?php echo $dato->a; ?></td>
                    <td><?php echo $dato->b; ?></td>
                    <td><a href="eliminar.php?code=<?php echo $dato->code; ?>"><button type=button class="btn btn-danger">Eliminar</button></a></td>
                    <td><a href="editar.php?code=<?php echo $dato->code; ?>"><button type=button class="btn btn-success">Modificar</button></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>