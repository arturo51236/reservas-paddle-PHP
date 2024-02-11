<?php 
session_start();

require_once 'app/config/config.php';
require_once 'app/modelos/Reserva.php';
require_once 'app/modelos/Sesion.php';
require_once 'app/modelos/Tramo.php';
require_once 'app/modelos/Usuario.php';
require_once 'app/modelos/DAOReservas.php';
require_once 'app/modelos/DAOTramos.php';
require_once 'app/modelos/DAOUsuarios.php';
require_once 'app/controladores/ControladorReservas.php';
require_once 'app/controladores/ControladorTramos.php';
require_once 'app/controladores/ControladorUsuarios.php';
require_once 'app/utils/dbconn.php';
require_once 'app/utils/error.php';

$mapa = array(
    'inicio' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'inicio', 'privada' => false),
    'registrar' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'registrar', 'privada' => false),
    'login' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'login', 'privada' => false),
    'logout' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'logout', 'privada' => true),
    'web_reservas' => array('controlador' => 'ControladorReservas', 'metodo' => 'web', 'privada' => true),
    'insertar_reserva' => array('controlador' => 'ControladorReservas', 'metodo' => 'insertar', 'privada' => true),
    'cancelar_reserva' => array('controlador' => 'ControladorReservas', 'metodo' => 'cancelar', 'privada' => true),
    'obtener_tramos' => array('controlador' => 'ControladorTramos', 'metodo' => 'obtener', 'privada' => true)
);

if (isset($_GET['accion'])) {
    if (isset($mapa[$_GET['accion']])) {
        $accion = $_GET['accion'];
    } else {
        header('Status: 404 Not found');
        echo 'Página no encontrada';
        die();
    }
} else {
    $accion = 'inicio';
}

if (!Sesion::existeSesion() && $mapa[$accion]['privada']) {
    $_SESSION['error'] = "Debes iniciar sesión para acceder a $accion";
    header('location: index.php');
    die();
}

$controlador = $mapa[$accion]['controlador'];
$metodo = $mapa[$accion]['metodo'];

$objeto = new $controlador();
$objeto->$metodo();
?>