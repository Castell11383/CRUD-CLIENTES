<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario para Crear Clientes</h1>
<div class="row justify-content-center text-light
s">
    <form action="../../controladores/clientes/guardar.php" method="POST" class="border bg-black bg-gradient shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del Cliente</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Apellidos del Cliente</label>
                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">No. de NIT</label>
                <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Telefono</label>
                <input type="number" name="cli_telefono" id="cli_telefono" min="0" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 text-light"><i class="bi bi-floppy-fill"></i> Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="buscar.php" class="btn btn-warning w-100 text-light"><i class="bi bi-search me-2"></i> Buscar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>