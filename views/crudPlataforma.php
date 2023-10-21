<?php
require_once '../controllers/plataformaController.php';
if (isset($_SESSION['usuario'])) {

    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo | Plataformas</title>

        <!-- BOOTSTRAP CSS 4.6-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/css/styles.css">

        <!-- BOOTSTRAP ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <script src="https://kit.fontawesome.com/c5171c7f74.js" crossorigin="anonymous"></script>
        <script src="../assets/js/jquery-3.7.1.min.js"></script>


        <script>
            function editar(Id, Modelo, Marca, Tipo, Cantidad, Precio, Costo, Imagen, Descripcion) {
                document.getElementById('marcas').selectedIndex = Marca;
                document.getElementById('tipos').selectedIndex = Tipo;
                document.getElementById('txtIdModelo').value = Id;
                document.getElementById('txtModelo').value = Modelo;

                document.getElementById('txtCantidad').value = Cantidad;
                document.getElementById('txtPrecio').value = Precio;
                document.getElementById('txtCosto').value = Costo;
                document.getElementById('txtDescripcion').value = Descripcion;

                $('#exampleModal').modal('show');
            }

            function insertPlataforma() {
                $('#insertPlataforma').modal('show');
            }
        </script>

    </head>

    <body>
        <!-- NAVBAR -->
        <header>
            <!-- BARRA DE NAVEGACION -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand  " href="../views/index.php"> <img height="100" src="../assets/images/logo.svg"
                        alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="plataformas.php">Catalogo de plataformas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="nosotros.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactanos.php">Contactanos</a>
                        </li>

                    </ul>

                    <span class="mx-auto">
                        <button type="button" class="btn position-relative">
                            <a class="btn" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark">
                                <div id="articulosCarrito"></div>
                            </span>
                        </button>
                    </span>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <div id="resController"></div>
                                <?php
                                if (isset($_SESSION['insertPlataforma'])) {
                                    if ($_SESSION['insertPlataforma'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                                Se registro con exito
                                            </div>';
                                    }
                                    if ($_SESSION['insertPlataforma'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                            No se puedo insertar ' . $_GET['info'] . '
                                        </div>';
                                    }
                                    if ($_SESSION['insertPlataforma'] == 'nc') {
                                        echo '<div class="alert alert-warning" role="alert">
                                            Imagen no compatible, solo se permiten archivos de imagen (jpg, jpeg, png, gif).
                                        </div>';
                                    }
                                    if ($_SESSION['insertPlataforma'] == 'sa') {
                                        echo '<div class="alert alert-danger" role="alert">
                                            Tiene que seleccionar una imagen
                                        </div>';
                                    }
                                    $_SESSION['insertPlataforma'] = '';
                                }

                                if (isset($_SESSION['deletePlataforma'])) {
                                    if ($_SESSION['deletePlataforma'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                                Se elimino con exito
                                            </div>';
                                    }
                                    if ($_SESSION['deletePlataforma'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                            No se puedo eliminar
                                        </div>';
                                    }
                                    $_SESSION['deletePlataforma'] = '';
                                }

                                if (isset($_SESSION['modificarPlataforma'])) {
                                    if ($_SESSION['modificarPlataforma'] == 's') {
                                        echo '<div class="alert alert-success" role="alert">
                                                Se actulizo la plataforma
                                            </div>';
                                    }
                                    if ($_SESSION['modificarPlataforma'] == 'n') {
                                        echo '<div class="alert alert-danger" role="alert">
                                            No se puedo actualizar la plataforma
                                        </div>';
                                    }
                                    $_SESSION['modificarPlataforma'] = '';
                                }

                                ?>
                                <div class="row p-2">
                                    <div class="col-md-2 border-right">
                                        <h4>Plataformas</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-nuevo-usuario"
                                            onclick="insertPlataforma()">Nueva plataforma</button>
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
                                                    <th>Modelo</th>
                                                    <th>Marca</th>
                                                    <th>Tipo</th>
                                                    <th>Cantidad</th>
                                                    <th>Re-orden</th>
                                                    <th>Precio</th>
                                                    <th>Costo</th>
                                                    <th>URL Imagen</th>
                                                    <th>Descripcion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tablaPlat = getPlataformasTabla($plataformaModel);
                                                if ($tablaPlat != '') {
                                                    echo getPlataformasTabla($plataformaModel);
                                                } else {
                                                    echo '<tr> Sin resultados... </tr>';
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <!-- FORMULARIO MODIFICAR -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editat plataforma</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../controllers/plataformaController.php?opc=6" method="POST"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <!-- <label for="txtIdModelo" class="col-form-label">Id Modelo:</label> -->
                                    <input type="hidden" class="form-control" id="txtIdModelo" name="txtIdModelo">
                                </div>
                                <div class="mb-3">
                                    <label for="txtModelo" class="col-form-label">Modelo:</label>
                                    <input type="text" class="form-control" id="txtModelo" name="txtModelo">
                                </div>
                                <div class="mb-3">
                                    <?= getMarcas($plataformaModel); ?>
                                </div>
                                <div class="mb-3">
                                    <?= getTipos($plataformaModel); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="txtCantidad" class="col-form-label">Cantidad:</label>
                                    <input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
                                </div>
                                <div class="mb-3">
                                    <label for="txtPrecio" class="col-form-label">Precio:</label>
                                    <input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
                                </div>
                                <div class="mb-3">
                                    <label for="txtCosto" class="col-form-label">Costo:</label>
                                    <input type="text" class="form-control" id="txtCosto" name="txtCosto">
                                </div>
                                <div class="mb-3">
                                    <label for="file">Selecciona una imagen:</label>
                                    <input type="file" name="file" id="file">
                                </div>

                                <div class="mb-3">
                                    <label for="txtDescripcion" class="col-form-label">Descripcion:</label>
                                    <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>
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

            <!-- INSERTAR NUEVA PLATAFORMA -->
            <div class="modal fade" id="insertPlataforma" tabindex="-1" aria-labelledby="insertPlataformaLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="insertPlataformaLabel">Nueva plataforma
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../controllers/plataformaController.php?opc=1" method="POST"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="txtModelo" class="col-form-label">Modelo:</label>
                                    <input type="text" class="form-control" id="txtModelo" name="txtModelo">
                                </div>
                                <div class="mb-3">
                                    <?= getMarcas($plataformaModel); ?>
                                </div>
                                <div class="mb-3">
                                    <?= getTipos($plataformaModel); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="txtCantidad" class="col-form-label">Cantidad:</label>
                                    <input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
                                </div>
                                <div class="mb-3">
                                    <label for="txtPrecio" class="col-form-label">Precio:</label>
                                    <input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
                                </div>
                                <div class="mb-3">
                                    <label for="txtCosto" class="col-form-label">Costo:</label>
                                    <input type="text" class="form-control" id="txtCosto" name="txtCosto">
                                </div>
                                <div class="mb-3">
                                    <label for="file">Selecciona una imagen:</label>
                                    <input type="file" name="file" id="file" required>
                                </div>

                                <div class="mb-3">
                                    <label for="txtDescripcion" class="col-form-label">Descripcion:</label>
                                    <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>
                                </div>

                                <input type="submit" class="btn  btn-nuevo-usuario w-100" name="Nuevo" value="Registrar">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>



        <!-- BOOTSTRAP CSS 4.6 -->
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
                    $("#articulosCarrito").html(data);
                    // alert('No. de articulos en el carro: ' + data)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus);
                }
            });
        })
    </script>

    <?php
} ?>