<?php
session_start();
if (isset($_SESSION["id_usuario"])) {
    header("Location: /views/index.php");
} else {
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
        <link rel="stylesheet" href="assets/css/login.css">

        <!-- ICONS FOOTER -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />



        <!-- <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet"> -->

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/styles.css">


    </head>

    <body>

        <main>
            <div class="wrapper fadeInDown p-5">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->
                    <div class="fadeIn first">
                        <img src="assets/images/logo.svg" id="icon" alt="User Icon" />
                    </div>

                    <!-- Login Form -->
                    <form action="controllers/usuarioController.php?opc=4" method="POST">
                        <input type="text" id="txtUsuario" class="fadeIn second" name="txtUsuario" placeholder="Usuario">
                        <input type="password" id="txtContrasena" class="fadeIn third" name="txtContrasena"
                            placeholder="Contraseña">
                        <input type="submit" class="fadeIn fourth btn-nuevo-usuario" value="Iniciar sesión">
                    </form>

                </div>
            </div>
        </main>



        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

        <!-- BOOTSTRAP CSS 4.6 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

    </html>
    <?php
}
?>