<?php
require_once '../controllers/usuarioController.php';
if (isset($_SESSION['usuario'])) {
    $usuarios = $usuarioModel->allUsuario();
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo | Usuarios</title>
        <!-- BOOTSTRAP CSS 4.6-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/css/styles.css">

        <!-- BOOTSTRAP ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- CSS FOOTER -->
        <link rel="stylesheet" href="../assets/css/footer.css">

        <!-- ICONS FOOTER -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <!-- jQuery  -->
        <script src="../assets/js/jquery-3.7.1.min.js"></script>
        <script src="https://kit.fontawesome.com/c5171c7f74.js" crossorigin="anonymous"></script>

        <script>

            // function mandarPOST() {
            //     alert('HOLA');
            //     $.ajax({
            //         type: "POST",
            //         url: "../controllers/usuarioController.php",
            //         data: {
            //             opc: '5',
            //         },
            //         dataType: "JSON",
            //         success: function (data) {
            //             $('#resController').html(data);
            //         },
            //         error: function (error) {
            //             console.log("Hubo un error al realizar la solicitud: ", error);
            //         }
            //     })
            // }
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
                                if (isset($_SESSION['res'])) {
                                    if ($_SESSION['res'] == 'insertado') {
                                        echo '<div class="alert alert-success" role="alert">
                                                Se registro el nuevo usuario
                                            </div>';
                                    }
                                    if ($_SESSION['res'] == 'actualizado') {
                                        echo '<div class="alert alert-success" role="alert">
                                            Se actualizo el usuario
                                        </div>';
                                    }
                                }
                                ?>
                                <div class="row p-2">
                                    <div class="col-md-2 border-right">
                                        <h4>Usuario</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-nuevo-usuario" data-toggle="modal"
                                            data-target="#usuarioModal" data-whatever="Nuevo">Nuevo usuario</button>
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
                                                    <th>Nombre</th>
                                                    <th>Usuario</th>
                                                    <th>Correo</th>
                                                    <th>Rol</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($usuarios->recordCount() > 0) {
                                                    while (!$usuarios->EOF) {
                                                        ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?php echo $usuarios->fields[0] ?>
                                                            <td>
                                                            <td>

                                                            </td>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuarios->fields[1] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuarios->fields[3] ?>
                                                            </td>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-nuevo-usuario"
                                                                    onclick="editar()" data-toggle="modal"
                                                                    data-target="#usuarioModal"
                                                                    data-id="<?= $usuarios->fields[0] ?>"
                                                                    data-usuario="<?= $usuarios->fields[1] ?>"
                                                                    data-contrasena="<?= $usuarios->fields[2] ?>"
                                                                    data-correo="<?= $usuarios->fields[3] ?>"
                                                                    data-whatever="Editar">
                                                                    <i class="fas fa-pen-square"></i>
                                                                </button>

                                                                <button type="button" class="btn btn-nuevo-usuario-danger"
                                                                    data-toggle="modal" data-target="#usuarioModal"
                                                                    data-id="<?= $usuarios->fields[0] ?>" data-whatever="Eliminar">
                                                                    <i class="fa fa-trash"></i></button>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                        $usuarios->MoveNext();
                                                    }
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
        </main>

        <!-- MODAL NUEVO USUARIO -->
        <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="usuarioModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="usuarioModalLabel">Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../controllers/usuarioController.php" method="POST">
                            <input type="hidden" name="opc" id="opc">
                            <input type="hidden" name="txtIdUsuario" id="txtIdUsuario">
                            <div class="form-group">
                                <label id="txtUsuario" for="txtUsuario" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" required>
                            </div>
                            <div class="form-group">
                                <label id="txtContrasena" for="txtContrasena" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" name="txtContrasena" id="txtContrasena"
                                    required>
                            </div>
                            <div class="form-group">
                                <label id="txtCorreo" for="txtCorreo" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary col" id="accionBtn">Accion</button>
                        <button type="button" class="btn btn-secondary col" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-secondary col" onclick="mandarPOST()">Probar</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $('#usuarioModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget)
                    var opc = button.data('whatever')
                    var modal = $(this)
                    modal.find('.modal-title').text(opc + ' usuario')
                    if (opc == 'Nuevo') {
                        modal.find('.modal-body input#opc').val(opc)
                        $("#accionBtn").text("Registrar usuario");
                        modal.find('.modal-body input#txtIdUsuario').val('')
                        modal.find('.modal-body input#txtUsuario').val('')
                        modal.find('.modal-body input#txtContrasena').val('')
                        modal.find('.modal-body input#txtCorreo').val('')
                        modal.find('.modal-body input#opc').val('1')
                    }
                    if (opc == 'Editar') {
                        var id = button.data('id')
                        var usuario = button.data('usuario')
                        var contrasena = button.data('contrasena')
                        var correo = button.data('correo')
                        modal.find('.modal-body input#txtIdUsuario').val(id)
                        modal.find('.modal-body input#txtUsuario').val(usuario)
                        modal.find('.modal-body input#txtContrasena').val(contrasena)
                        modal.find('.modal-body input#txtCorreo').val(correo)
                        modal.find('.modal-body input#opc').val('2')
                        $("#accionBtn").text("Actualizar usuario");
                    }
                    if (opc == 'Eliminar') {
                        // $("#tx").hide();

                        var id = button.data('id')
                        console.log('Eliminar ' + id);
                        var usuario = button.data('usuario')
                        var contrasena = button.data('contrasena')
                        var correo = button.data('correo')

                        modal.find('.modal-body input#txtIdUsuario').val(id)
                        modal.find('.modal-body input#txtUsuario').hide()
                        modal.find('.modal-body input#txtContrasena').hide()
                        modal.find('.modal-body input#txtCorreo').hide()
                        modal.find('.modal-body label#txtCorreo').hide()
                        modal.find('.modal-body label#txtUsuario').hide()
                        modal.find('.modal-body label#txtContrasena').hide()
                        modal.find('.modal-body input#opc').val('3')
                        modal.find('.modal-title').text("¿Seguro que desea eliminar el usuario " + usuario + " ?")
                        $("#accionBtn").text("Eliminar");
                        $("#accionBtn").addClass('btn-danger').click(function () {
                            var id = document.getElementById("txtIdUsuario").value;
                            jQuery.ajax({
                                type: "POST",
                                url: "../controllers/usuarioController.php",
                                data: {
                                    opc: '3',
                                },
                                dataType: "JSON",
                                success: function (data) {
                                    $('#resController').html(data);
                                },
                                error: function (error) {
                                    console.log("Hubo un error al realizar la solicitud: ", error);
                                }
                            })
                        })
                    }
                })


            })
        </script>




        <!-- SCRIPTS -->
        <!-- <script src="/assets/js/slider.js"></script> -->

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- BOOTSTRAP CSS 4.6 -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
            crossorigin="anonymous"></script>


    </body>

    </html>
    <?php
}
?>