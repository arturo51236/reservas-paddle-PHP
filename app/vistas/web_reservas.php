<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="./web/css/styles.css">
    <link rel="shortcut icon" href="./web/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <ul class="nav col-12 mt-1">
            <div class="d-flex flex-wrap col-8">
                <li class="nav-item d-flex flex-row align-items-center">
                    <img src="./web/images/user.png" style="width: 100px; height: 60px;">
                    <h2 class="nav-link text-white" style="font-size: 20px"><?= Sesion::getUsuario()->getNombre() ?></h2>
                </li>
            </div>
            <div class="d-flex col-4 flex-column align-items-end">
                <form class="d-flex mt-2 me-4" method="GET">
                    <button class="btn btn-outline-light" type="reset" onclick="location.href='index.php?accion=logout'">Cerrar sesión</button>
                </form>
            </div>
        </ul>
    </nav>

    <div class="background" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./web/images/paddle.jpeg') center/cover no-repeat;"></div>

    <main>
        <div class="container text-center my-4">
            <h1 class="text-white">Realice su reserva de la pista de padel</h1>
        </div>

        <div class="container text-center">
            <form>
                <input type="date" id="fecha">
            </form>
        </div>

        <div class="modal fade" id="confirmarReserva" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme="dark">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">¿Deseas confirmar la reserva?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="mod-cancelar-conf" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="confirmar-reserva">Confirmar reserva</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cancelarReserva" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme="dark">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">¿Estas seguro de que deseas cancelar la reserva?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="mod-cancelar-canc" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="cancelar-reserva">Cancelar reserva</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./web/js/web_reservas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>