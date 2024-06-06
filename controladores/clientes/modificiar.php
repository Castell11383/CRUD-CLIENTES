<?php

require '../../modelos/cliente.php';

$_POST['cli_codigo'] = filter_var($_POST['cli_codigo'], FILTER_VALIDATE_INT);
$_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
$_POST['cli_apellido'] = htmlspecialchars($_POST['cli_apellido']);
$_POST['cli_nit'] = filter_var($_POST['cli_nit'], FILTER_VALIDATE_INT);
$_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);

if ($_POST['cli_nombre'] == '' || $_POST['cli_apellido' == ''] || $_POST['cli_nit'] == '' || $_POST['cli_telefono'] == '') {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
     
        $clienteNuevo = new  cliente($_POST);

        $modficar = $clienteNuevo->modificar();

        $resultado = [
            'mensaje' => 'CLIENTE MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
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