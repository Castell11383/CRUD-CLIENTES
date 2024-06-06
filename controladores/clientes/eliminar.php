<?php

require "../../modelos/cliente.php";
include_once '../templates/header.php';
$_GET['cli_codigo'] = filter_var(base64_decode($_GET['cli_codigo']), FILTER_SANITIZE_NUMBER_INT);

$Eliminar = new Cliente($_GET);


try {

    $clienteEliminar = $Eliminar->eliminar();

    $resultado = [
        'mensaje' => 'CLIENTE ELIMINADO EXITOSAMENTE',
        'codigo' => 1
    ];

} catch (PDOException $pe) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR AL ELIMINAR EL CLIENTE DE LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO ERROR EN LA EJECUCION',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];
  
include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/clientes/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  

