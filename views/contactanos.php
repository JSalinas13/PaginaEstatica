<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo | Contactanos</title>

        <!-- BOOTSTRAP CSS 4.6-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/contactanos.css">

        <!-- BOOTSTRAP ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- CSS FOOTER -->
        <link rel="stylesheet" href="assets/css/footer.css">

        <!-- ICONS FOOTER -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <script src="https://kit.fontawesome.com/c5171c7f74.js" crossorigin="anonymous"></script>

    </head>

    <body>

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
                </div>
            </nav>
        </header>

        <main>
            <section class="form-contactanos">
                <div class="container contact-form">
                    <div class="contact-image">
                        <img src="../assets/images/logo.svg" alt="logo" />
                    </div>
                    <form method="post">
                        <h3>Contactanos</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="txtNombre" class="form-control" placeholder="Nombre *"
                                        required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtCorreo" class="form-control" placeholder="Correo *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtTelefono" class="form-control" placeholder="Telefono *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btnSubmit" class="btnContact" value="Contactar" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="txtDescripcion" class="form-control" placeholder="Descripción *"
                                        style="width: 100%; height: 150px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>



        <!-- SCRIPTS -->



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
} else {
    header("Location: ../index.php");
    exit;
}
?>