<?php 

class ControladorTramos {
    public function obtener() {
        $connDB = new dbconn(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $connDB->getConnexion();
        $reservasDAO = new DAOReservas($conn);
        $tramosDAO = new DAOTramos($conn);

        $tramos = $tramosDAO->getAll();

        $fecha = htmlspecialchars($_GET['fecha']);

        $reservasPorFecha = $reservasDAO->getReservasByFecha($fecha);

        if ($reservasPorFecha != null) {
            foreach ($reservasPorFecha as $i => $reserva) {
                $color = ($reserva->getIdusuario() == Sesion::getUsuario()->getId()) ? ':azul' : ':rojo';

                foreach ($tramos as $j => $tramo) {
                    if ($tramosDAO->getIdByTramo($tramo) !== null) {
                        if ($reserva->getIdtramo() == $tramosDAO->getIdByTramo($tramo)) {
                            $tramos[$j] = $tramo . $color;
                        }
                    }
                }
            }
        }

        print json_encode($tramos);
    }
}
?>