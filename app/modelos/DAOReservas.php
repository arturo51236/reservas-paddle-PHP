<?php

class DAOReservas {
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Obtiene todas las reservas de una fecha concreta
     * @return array|null Devuelve un array con las tareas de esa fecha o null si esa fecha no tiene reservas
     */
    public function getReservasByFecha($fecha):array|null {
        if (!$stmt = $this->conn->prepare("SELECT * FROM reservas WHERE fecha = ?")) {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt->bind_param('s', $fecha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows >= 1) {
            $array_reservas = array();
            while ($reserva = $result->fetch_object(Reserva::class)) {
                $array_reservas[] = $reserva;
            }
            return $array_reservas;
        } else {
            return null;
        }
    }

    /**
     * Inserta en la base de datos la reserva que recibe como parámetro
     * @return bool Devuelve true si se ha ejecutado correctamente o false en caso de error
     */
    public function insert(Reserva $reserva):bool {
        if (!$stmt = $this->conn->prepare("INSERT INTO reservas (idusuario, idtramo, fecha) VALUES (?,?,?)")) {
            die("Error al preparar la consulta insert: " . $this->conn->error );
        }

        $idusuario = $reserva->getIdusuario();
        $idtramo = $reserva->getIdtramo();
        $fecha = $reserva->getFecha();
        $stmt->bind_param('iis', $idusuario, $idtramo, $fecha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Elimina de la base de datos la reserva con la fecha y idtramo que recibe como parámetro
     * @return bool Devuelve true si se ha ejecutado correctamente o false en caso de error
     */
    public function delete($fecha, int $idtramo):bool {
        if (!$stmt = $this->conn->prepare("DELETE FROM reservas WHERE fecha = ? AND idtramo = ?")) {
            die("Error al preparar la consulta insert: " . $this->conn->error );
        }

        $stmt->bind_param('si', $fecha, $idtramo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>