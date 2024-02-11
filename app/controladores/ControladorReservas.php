<?php 

class ControladorReservas {
    public function web() {
        $error = '';
        require 'app/vistas/web_reservas.php';
    }

    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $connDB = new dbconn(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $connDB->getConnexion();
            $reservasDAO = new DAOReservas($conn);
            $tramosDAO = new DAOTramos($conn);

            $fecha = htmlspecialchars($_GET['fecha']);
            $hora = htmlspecialchars($_GET['hora']);
            $idtramo = $tramosDAO->getIdByTramo($hora);
            $idusuario = Sesion::getUsuario()->getId();

            $reserva = new Reserva();
            $reserva->setIdusuario($idusuario);
            $reserva->setIdtramo($idtramo);
            $reserva->setFecha($fecha);

            if ($reservasDAO->insert($reserva)) {
                print json_encode(['respuesta' => 'Inserción correcta', 'fecha' => $fecha, 'hora' => $hora]);
            }
        }
    }

    public function cancelar() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $connDB = new dbconn(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $connDB->getConnexion();
            $reservasDAO = new DAOReservas($conn);
            $tramosDAO = new DAOTramos($conn);

            $fecha = htmlspecialchars($_GET['fecha']);
            $hora = htmlspecialchars($_GET['hora']);
            $idtramo = $tramosDAO->getIdByTramo($hora);

            if ($reservasDAO->delete($fecha, $idtramo)) {
                print json_encode(['respuesta'=>'Cancelación correcta', 'fecha' => $fecha, 'hora' => $hora]);
            }
        }
    }
}
?>