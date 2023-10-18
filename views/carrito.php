<?php
require_once '../controllers/carritoController.php';
if (isset($_SESSION['id_usuario'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo | Carrito</title>

        <!-- CARDS CSS BOOTSTRAP -->

        <!-- BOOTSTRAP CSS 4.6 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/css/cards.css">
        <link rel="stylesheet" href="../assets/css/styles.css">

        <!-- BOOTSTRAP ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- SCRIPTS -->
        <script src="https://kit.fontawesome.com/c5171c7f74.js" crossorigin="anonymous"></script>



        <script src="../assets/js/jquery-3.7.1.min.js"></script>

        <script>
            function editar(Id, Usuario, Modelo, Cantidad, Fecha, Precio, Descuento) {
                document.getElementById('txtIdCarrito').value = Id;
                document.getElementById('txtIdUsuario').value = Usuario;
                document.getElementById('txtIdModelo').value = Modelo;
                document.getElementById('txtCantidad').value = Cantidad;
                document.getElementById('txtFecha').value = Fecha;
                document.getElementById('txtPrecio').value = Precio;
                document.getElementById('txtDescuento').value = Descuento;

                $('#editarCarrito').modal('show');
            }

            function insertPlataforma() {
                $('#insertPlataforma').modal('show');
            }
        </script>

    </head>

    <body>
        <!-- NAVBAR -->
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="../assets/images/logo.svg" alt="LOGO"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="plataformas.php">Catalogo de plataformas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="nosotros.php">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactanos.php">Contactanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="usuario.php">Usuarios</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <span class="mx-auto">
                                <button type="button" class="btn position-relative">
                                    <a class="btn" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark">
                                        <div id="articulosCarritoCarrito"></div>
                                    </span>
                                </button>
                            </span>
                        </span>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <?php

                                if (isset($_SESSION['compraCarrito'])) {
                                    if ($_SESSION['compraCarrito'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                        Se compro el carrito con exito
                                        </div>';
                                    }
                                    if ($_SESSION['compraCarrito'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                        Algunos productos no se compraron ya que no hay stock suficiente 
                                        </div>';
                                    }
                                    $_SESSION['compraCarrito'] = '';
                                }

                                if (isset($_SESSION['deleteCarrito'])) {
                                    if ($_SESSION['deleteCarrito'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                                    Se elimino con exito
                                                </div>';
                                    }
                                    if ($_SESSION['deleteCarrito'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                                No se puedo eliminar: 
                                            </div>';
                                    }
                                    $_SESSION['deleteCarrito'] = '';
                                }


                                if (isset($_SESSION['updateCarrito'])) {
                                    if ($_SESSION['updateCarrito'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                                    Se actulizo correctamente
                                                </div>';
                                    }
                                    if ($_SESSION['updateCarrito'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                                No se pudo actualizar
                                            </div>';
                                    }
                                    $_SESSION['updateCarrito'] = '';
                                }

                                ?>
                                <div id="resController"></div>
                                <div class="row p-2">
                                    <div class="col-md-2 border-right">
                                        <h4>Carrito</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>
                                                        <div class="form-check-inline">
                                                            Id
                                                        </div>
                                                    </th>
                                                    <th>Usuario</th>
                                                    <th>Modelo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Descuento</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tablaPlat = getCarritoTabla($carritoModel);
                                                if ($tablaPlat != '') {
                                                    echo getCarritoTabla($carritoModel);
                                                } else {
                                                    echo '<tr> Sin resultados... </tr>';
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $totalCarrito = totalCarrito($carritoModel, $_SESSION['id_usuario']);
                                    if ($totalCarrito != '') {
                                        ?>
                                        <div class="col-6">
                                            <a href="../controllers/compraController.php?opc=5&id=<?= $_SESSION['id_usuario'] ?>"
                                                class="btn btn-nuevo-usuario w-100">Pagar</a>
                                        </div>
                                        <div class="col-6">
                                            TOTAL:
                                            <?= $totalCarrito ?>
                                        </div>
                                        <?php
                                    } else {
                                        echo '<tr> Sin resultados... </tr>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <img src="" alt="">



            <!-- FORMULARIO MODIFICAR -->
            <div class="modal fade" id="editarCarrito" tabindex="-1" aria-labelledby="editarCarritoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editarCarritoLabel">Editat plataforma</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../controllers/carritoController.php?opc=2" method="POST"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="txtIdCarrito" name="txtIdCarrito">
                                    <input type="hidden" class="form-control" id="txtIdUsuario" name="txtIdUsuario">
                                    <input type="hidden" class="form-control" id="txtIdModelo" name="txtIdModelo">
                                    <input type="hidden" class="form-control" id="txtFecha" name="txtFecha">
                                    <input type="hidden" class="form-control" id="txtPrecio" name="txtPrecio">
                                    <input type="hidden" class="form-control" id="txtDescuento" name="txtDescuento">

                                </div>

                                <div class="mb-3">
                                    <label for="txtCantidad" class="col-form-label">Cantidad:</label>
                                    <input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
                                </div>

                                <input type="submit" class="btn  btn-nuevo-usuario w-100" name="Actualizar"
                                    value="Actualizar">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>



    </body>

    </html>


    <script>
        $(document).ready(function () {
            $.ajax({
                url: '../controllers/carritoController.php?opc=20',
                type: 'POST',
                data: {
                    id_Usuario: <?= trim($_SESSION['id_usuario']) ?>
                },
                success: function (data) {
                    $("#articulosCarritoCarrito").html(data);
                    // alert('No. de articulos en el carro: ' + data)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus);
                }
            });
        })
    </script>

    <?php
} else {
    header("Location: ../index.php");
    exit;
}
?>