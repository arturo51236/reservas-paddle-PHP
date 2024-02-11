<?php

class DAOUsuarios {
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Obtiene un usuario de la tabla usuarios en función del email
     * @return Usuario|null Devuelve un objeto de la clase Usuario o null si no existe
     */
    public function getByEmail($email):Usuario|null {
        if (!$stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ?")) {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_object(Usuario::class);
            return $usuario;
        } else {
            return null;
        }
    }

    /**
     * Inserta en la base de datos el usuario que recibe como parámetro
     * @return bool Devuelve true si se ha ejecutado correctamente o false en caso de error
     */
    public function insert(Usuario $usuario):bool {
        if (!$stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?,?,?)")) {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $passwd = $usuario->getPassword();
        $stmt->bind_param('sss', $nombre, $email, $passwd);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>