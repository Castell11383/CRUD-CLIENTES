<?php
//  ini_set('display_errors', '1');
//  ini_set('display_startup_errors', '1');
//  error_reporting(E_ALL);

require '../../modelos/cliente.php';

$_POST['cli_codigo'] = filter_var($_POST['cli_codigo'], FILTER_VALIDATE_INT);
$_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
$_POST['cli_apellido'] = htmlspecialchars($_POST['cli_apellido']);
$_POST['cli_nit'] = filter_var($_POST['cli_nit'], FILTER_VALIDATE_INT);
$_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);

//  var_dump ($_POST);

if ( $_POST['cli_nombre'] == '' || $_POST['cli_apellido'] == '' || $_POST['cli_nit'] < 0 || $_POST['cli_telefono'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $ClienteNuevo = new Cliente($_POST);
        $modificar = $ClienteNuevo->modificar();
        $resultado = [
            'mensaje' => 'CLINTE INGRESADO  CORRECTAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
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
        <a href="../../controladores/clientes/buscar.php" class="btn btn-primary w-100"><i class="bi bi-backspace-fill"></i> Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  