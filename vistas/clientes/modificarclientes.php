<?php

require "../../modelos/cliente.php";
include_once '../templates/header.php';

 ( $_GET['cli_codigo'] = filter_var(base64_decode($_GET['cli_codigo']),FILTER_SANITIZE_NUMBER_INT));

//  var_dump($_GET);
//  exit;

$modificar = new Cliente();
$ClienteModificar = $modificar->buscarID($_GET['cli_codigo']);

// echo $ClienteModificar['cli_nombre'];    

?>

<h1 class="text-center">Formulario para modificar Clientes</h1>
<div class="row justify-content-center text-light">
    <form action="../../controladores/clientes/modificar.php" method="POST" class="border bg-black bg-gradient shadow rounded p-4 col-lg-6">
    <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="cli_codigo" id="cli_codigo" class="form-control" value="<?=  $ClienteModificar['cli_codigo'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_codigo">Nombre del Cliente</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control" value="<?= $ClienteModificar['cli_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Apellidos del Cliente</label>
                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" value="<?= $ClienteModificar['cli_apellido'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">No. de NIT</label>
                <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" value="<?= $ClienteModificar['cli_nit'] ?>" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Telefono</label>
                <input type="number" name="cli_telefono" id="cli_telefono" min="0" step="0.01" class="form-control" value="<?= $ClienteModificar['cli_telefono']?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 text-light"><i class="bi bi-floppy-fill"></i> Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/clientes/buscar.php" class="btn btn-danger w-100 text-light"><i class="bi bi-skip-backward-fill"></i> Regresar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>