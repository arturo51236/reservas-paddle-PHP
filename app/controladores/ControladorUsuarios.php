<?php 

class ControladorUsuarios {
    public function inicio() {
        $error = '';

        if (Sesion::existeSesion()) {
            header('location: index.php?accion=web_reservas');
            die();
        }

        require 'app/vistas/inicio.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $connDB = new dbconn(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $connDB->getConnexion();
            $usuariosDAO = new DAOUsuarios($conn);

            if ($usuario = $usuariosDAO->getByEmail($email)) {
                if (password_verify($password, $usuario->getPassword())) {
                    Sesion::iniciarSesion($usuario);

                    header('location: index.php?accion=web_reservas');
                    die();
                }
            }

            $_SESSION['error'] = "Email o password incorrectos";
            header('location: index.php');
        }
    }

    public function registrar() {
        $error = '';
        $foto = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $connDB = new dbconn(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $connDB->getConnexion();
            $usuariosDAO = new DAOUsuarios($conn);

            $nombre = htmlspecialchars($_POST['nombre']);
            $email = htmlspecialchars($_POST['email']);
            $passwd = htmlspecialchars($_POST['password']);

            if (empty($nombre) || empty($email) || empty($passwd)) {
                $error = "Es obligatorio rellenar todos los campos";
            }

            if ($usuariosDAO->getByEmail($email) != null) {
                $error = "Ya existe un usuario con ese email";
            } else {
                if ($error == '') {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setEmail($email);
                    $passwdCifrado = password_hash($passwd, PASSWORD_DEFAULT);
                    $usuario->setPassword($passwdCifrado);

                    if ($usuariosDAO->insert($usuario)) {
                        header("location: index.php");
                        die();
                    } else {
                        $error = "No se ha podido insertar el usuario";
                    }
                }
            }
        }

        require 'app/vistas/registro.php';
    }

    public function logout() {
        Sesion::cerrarSesion();
        header('location: index.php');
    }
}
?>