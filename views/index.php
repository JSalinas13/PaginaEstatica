<?php
require_once '../controllers/plataformaController.php';
if (isset($_SESSION['usuario'])) {

    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plataformas carrillo | Inicio</title>

        <!-- BOOTSTRAP CSS 4.6-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- BOOTSTRAP ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- CSS FOOTER -->
        <link rel="stylesheet" href="../assets/css/footer.css">

        <!-- ICONS FOOTER -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

        <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/css/slider.css">
        <link rel="stylesheet" href="../assets/css/cards.css">
        <link rel="stylesheet" href="../assets/css/mapa.css">
        <link rel="stylesheet" href="../assets/css/styles.css">

        <script src="../assets/js/jquery-3.7.1.min.js"></script>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio</a>
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
                        <?php echo isset($_SESSION['usuario']) ? 'Bienvenido ' . $_SESSION['usuarioNombre'] : '<a class="nav-link" href="../index.php">Iniciar sesión</a>' ?>
                    </span>

                </div>
            </nav>
        </header>


        <main>
            <!-- SLIDER -->
            <section class="slider">
                <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="mask flex-center">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-7 col-12 order-md-1 order-2">
                                            <h4>JLG-E300AJ<br></h4>
                                            <p class="d-none d-md-block">Mayor versatilidad con la posibilidad de elegir
                                                entre dos modelos con alturas
                                                de trabajo hasta los 11,00 m. Plumín de articulación compacto que mejora el
                                                posicionamiento en los espacios de trabajo reducidos. Control automático de
                                                la tracción de serie que ofrece un mejor rendimiento sobre el terreno y
                                                mayor capacidad de maniobra. Tracción eléctrica directa sumamente eficiente
                                                con ciclos de trabajo más largos, que aumenta la productividad. Emisión de
                                                gases cero, que hace que los plataformas sean ecológicos</p>
                                            <a href="plataformas.php">Ver más</a>
                                        </div>
                                        <div class="col-md-5 col-12 order-md-2 order-1">
                                            <img src="../assets/images/plataformas/14/JLG- E300AJ.png" class="mx-auto"
                                                alt="slide">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="mask flex-center">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-7 col-12 order-md-1 order-2">
                                            <h4>JLG-800SJP<br></h4>
                                            <p class="d-none d-md-block">El diseño del brazo QuikStick® patentado de JLG
                                                reduce significativamente los
                                                tiempos de ciclo de ascenso/descenso. Alcance de primera categoría que
                                                permite mejorar la productividad. Opciones de accesorios Workstation in the
                                                Sky™ disponibles para ayudar a hacer el trabajo.</p>
                                            <a href="plataformas.php">Ver más</a>
                                        </div>
                                        <div class="col-md-5 col-12 order-md-2 order-1"><img
                                                src="../assets/images/plataformas/27/JLG-800AJ.png" class="mx-auto"
                                                alt="slide"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="mask flex-center">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-7 col-12 order-md-1 order-2">
                                            <h4>GENIE-Z4525JDC<br></h4>
                                            <p class="d-none d-md-block">La plataforma articulada
                                                eléctrica Genie® Z®-45/25J DC ofrece un
                                                funcionamiento silencioso y libre de emisiones. Con esta plataforma
                                                eléctrica Genie, los operarios pueden trabajar junto a edificios o alrededor
                                                de obstáculos, y acceder a trabajos por encima de la cabeza en pasillos y
                                                espacios congestionados.</p>
                                            <a href="plataformas.php">Ver más</a>
                                        </div>
                                        <div class="col-md-5 col-12 order-md-2 order-1"><img
                                                src="../assets/images/plataformas/18/GENIE-Z4525JDC.png" class="mx-auto"
                                                alt="slide"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                            class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <!--SLIDER END-->

            <!-- plataformas CARDS -->
            <section class="cards-plataformas">
                <div class="container mt-40">
                    <h3 class="text-center">Plataformas</h3>
                    <div class="row mt-30">
                        <?php
                        echo getCardsPlataformas($plataformaModel);
                        ?>
                    </div>
                </div>
            </section>
            <!-- plataformas CARDS END -->


            <!-- UBICACIÓN -->
            <section class="ubicacion">
                <!-- contact-section -->
                <div class="contact-map-section">
                    <!-- contact-map -->
                    <div id="contact-map"></div>
                    <!-- /.contact-map -->
                    <!-- contact-info -->
                    <div class="contact-section">
                        <div class="container">
                            <div class="row">
                                <!-- contact-block -->
                                <div class="d-none d-md-block col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopr nopl">
                                    <div class="card contact-block">
                                        <div class="card-body">
                                            <h3 class="mb0">Plataformas carrillo</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                                <div class="d-none d-xl-block d-xxl-none col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 ">
                                </div>
                                <!-- contact-block -->
                                <div
                                    class="d-none d-xl-block d-xxl-none col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 nopr nopl">
                                    <div class="card contact-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
                                                    <div class="contact-icon"><i class="far fa-clock"></i></div>
                                                </div>
                                                <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12 ">
                                                    <h6 class="card-title">Horario:</h6>
                                                    <p class="contact-small-text">Domingo <span class="float-right">
                                                            Cerrado</span></p>
                                                    <p class="contact-small-text"> Lun - Vie<span class="float-right">08:00
                                                            - 05:00 Pm</span></p>
                                                    <p class="contact-small-text"> Sabado <span class="float-right"> 08:00 -
                                                            02:00 Pm</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                                <!-- contact-block -->
                                <div
                                    class="d-none d-xl-block d-xxl-none col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 nopr nopl">
                                    <div class="card contact-block">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
                                                <div class="contact-icon mt20"><i class="far fa-map"></i></div>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12 ">
                                                <div class="card-body">
                                                    <h6 class="card-title">Información</h6>
                                                    <p class="contact-small-text">Av. Aeropuerto 116, 38116 Gto.</p>
                                                    <p class="contact-small-text">jesus.salinas@plataformascarrillo.com</p>
                                                    <p class="contact-small-text">+52 - 461 2722826</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                                <!-- contact-block -->
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-4 col-12 nopr nopl ">
                                    <div class="card contact-block contact-btn">
                                        <div class="card-body">
                                            <a href="contactanos.php" class="btn btn-default btn-block">Contactanos</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                            </div>

                        </div>
                    </div>
                    <!-- /.contact-info -->
                </div>
            </section>
            <!-- UBICACIÓN END -->

            <!-- FOOTER -->
            <section id="footer">
                <div class="container">
                    <div class="row text-center text-xs-center text-sm-left text-md-left">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <h5>Plataformas carrillo</h5>
                            <ul class="list-unstyled quick-links">
                                <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Inicio</a></li>
                                <li><a href="plataformas.php"><i class="fa fa-angle-double-right"></i>Catalogo de
                                        plataformas</a></li>
                                <li><a href="nosotros.php"><i class="fa fa-angle-double-right"></i>Nosotros</a></li>
                                <li><a href="contactanos.php"><i class="fa fa-angle-double-right"></i>Contactanos</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">

                            <p class="h6">© Copyright.<a class="text-green ml-2" href="https://www.sunlimetech.com"
                                    target="_blank"></a></p>
                        </div>
                        <hr>
                    </div>
                </div>
            </section>
            <!-- FOOTER END -->
        </main>



        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script>
            function initMap() {
                var uluru = {
                    lat: 20.5181028,
                    lng: -100.8947046
                };
                var map = new google.maps.Map(document.getElementById('contact-map'), {
                    zoom: 16,
                    center: uluru,
                    scrollwheel: false
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    icon: 'https://easetemplate.com/free-website-templates/kitchen/images/map_marker.png'

                });
            }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZib4Lvp0g1L8eskVBFJ0SEbnENB6cJ-g&callback=initMap">
            </script>


        <!-- SCRIPTS -->
        <script src="../assets/js/slider.js"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--  -->


        <!-- SCRIPTS -->
        <script src="https://kit.fontawesome.com/c5171c7f74.js" crossorigin="anonymous"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit;
}
?>