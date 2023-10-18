<?php
session_start();
if (isset($_SESSION['id_usuario'])) {

    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo</title>

        <!-- BOOTSTRAP CSS 4.6-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/styles.css">

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
            <section>
                <div class="container p-4">
                    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-lg-6">
                                <div class="img-about">
                                    <img src="../assets/images/V1.1 copia@0,25x_2.svg" class="img-about">
                                </div>
                            </div>
                            <div class="col col-md-6 col-sm-12">
                                <h2 class="align-middle">
                                    Acerca de <span style="color: #fe5b29;">nosotros</span>
                                </h2>
                                <div class="texto-about">
                                    <p>
                                        En Plataformas Carrillo, estamos comprometidos con proporcionar soluciones de
                                        alquiler confiables y eficientes para satisfacer las necesidades de nuestros
                                        clientes en el campo de la construcción, la industria y otros sectores relacionados.
                                        Permítanme guiarlos a través de un recorrido por nuestros servicios y los beneficios
                                        que ofrecemos.
                                    </p>
                                    <p>
                                        Plataformas de elevación: Contamos con una flota diversa de plataformas de
                                        elevación, como elevadores telescópicos, elevadores de tijera y plataformas
                                        articuladas, que permiten acceder a áreas de trabajo elevadas de manera segura y
                                        eficiente
                                    </p>
                                    <p>
                                        Montacargas: Proporcionamos montacargas de diferentes capacidades y especificaciones
                                        para facilitar la manipulación de cargas pesadas y mejorar la eficiencia logística
                                        en los lugares de trabajo.
                                    </p>
                                    <p>
                                        Generadores: Suministramos generadores de energía confiables y eficientes que
                                        garantizan un suministro constante de electricidad en situaciones donde la red
                                        eléctrica no está disponible o es insuficiente.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Mision y vision -->
                        <div class="row p-5">
                            <div class="col">
                                <h2 class="align-middle">
                                    <span style="color: #fe5b29;">Misión</span>
                                </h2>

                                <ul>
                                    <li>
                                        <p>
                                            Proveer soluciones seguras y flexibles, arrendamiento y mantenimiento de
                                            equipo moderno. Oportunamente y de manera confiable y sequra para
                                            actividades de construcción, mantenimiento e instalaciones especializadas
                                            que promuevan el desarrollo y crecimiento rentable de la empresa y de su
                                            capital humano.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Desarrollar objetivos concretos de crecimiento y la capacidad de evaluar
                                            financieramente todas nuestras decisiones y actividades
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Contar con una flota de plataformas reciente y sin problemas
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Desarrollo del capital humano.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Crear y evaluar nuevas oportunidades de negocio que apoyen a lograr los
                                            objetivos de crecimiento.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Posicionarnos como una empresa líider, proporcionando el mejor
                                            servicio y calidad para nuestros clientes.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col content-">
                                <h2 class="align-middle">
                                    <span style="color: #fe5b29;">Visión</span>
                                </h2>

                                <p class="text-justify">
                                    Ser el proveedor más importante de soluciones estratégicas, seguras y flexibles de
                                    arrendamiento y mantenimiento de equipo para los sectores de la construcción,
                                    mantenimiento e instalaciones especializadas en México, Consolidarnos como empresa lider
                                    capaz de dar soluciones de condicionamiento y adecuación para actividades especializadas
                                    y profesionales dentro de los mercados de construcción gobierno, industrial, comercial,
                                    habitacional, entre otros. Lograr un crecimiento sostenible y estable, con
                                    reconocimiento en seguridad, calidad y confiabilidad para nuestros clientes y
                                    proveedores.
                                </p>

                            </div>
                        </div>
                    </div>
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