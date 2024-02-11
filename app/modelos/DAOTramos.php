<?php

class DAOTramos {
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Obtiene todos los tramos de la tabla tramos
     * @return array|null Devuelve un array con todos los tramos o null en caso de error
     */
    public function getAll():array|null {
        if (!$stmt = $this->conn->prepare("SELECT * FROM tramos")) {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows >= 1) {
            $array_tramos = array();
            while ($tramo = $result->fetch_object(Tramo::class)) {
                $array_tramos[] = $tramo->getHora();
            }
            return $array_tramos;
        } else {
            return null;
        }
    }

    /**
     * Obtiene el id del tramo que le llega como parámetro
     * @return int|null Devuelve el id de la hora o null si ha hora que le llega no existe en la tabla
     */
    public function getIdByTramo($hora):int|null {
        if (!$stmt = $this->conn->prepare("SELECT id FROM tramos WHERE hora = ?")) {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt->bind_param('s', $hora);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows >= 1) {
            return $result->fetch_assoc()['id'];
        } else {
            return null;
        }
    }
}
?>