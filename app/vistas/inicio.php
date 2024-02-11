<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./web/css/styles.css">
    <link rel="shortcut icon" href="./web/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="height: 100vh;">
    <main class="d-flex flex-column justify-content-center align-items-center h-100">
        <div class="background" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./web/images/paddle.jpeg') center/cover no-repeat;"></div>
        <div class="text-center mt-4">
            <h1 class="text-white">Reservas ANB</h1>
        </div>
        <div class="m-auto d-flex flex-column w-25 login bg-dark text-white text-center rounded rounded-4">
            <form action="index.php?accion=login" method="POST" class="mt-4">
                <h1>Inicio de sesión</h1>
                <div class="row mb-3 m-auto">
                    <label for="inputEmail3" class="col-sm-2 col-form-label m-auto">Email:</label><br>
                    <div class="col-sm-10 w-100">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Introduce tu email">
                    </div>
                </div>
                <div class="row mb-3 m-auto">
                    <label for="inputPassword3" class="col-sm-2 col-form-label m-auto">Contraseña:</label><br>
                    <div class="col-sm-10 w-100 mb-4">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Introduce tu contraseña">
                    </div>
                </div>
                <div class="row m-auto">
                    <div class="col-sm-10 w-100 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Acceder</button>
                    </div>
                </div>
            </form>

            <form method="GET" class="bg-dark text-white text-center rounded-top rounded-4 pb-3">
                <p>¿No tienes cuenta aún? Crea una ahora</p>
                <div class="row m-auto">
                    <div class="col-sm-10 w-100">
                        <button type="reset" class="btn btn-danger w-100" onclick="location.href='index.php?accion=registrar'">Registro</button>
                    </div>
                </div>
            </form>
        </div>
        <?php mostrarError($error); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>