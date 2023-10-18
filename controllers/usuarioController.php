<?php
require_once '../models/conexion.php';
require_once '../models/usuarioModel.php';
require_once '../assets/adodb5/adodb.inc.php';
$usuarioModel = new UsuarioModel();
if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
        case 1: //INSERT TO DB
            $usuario = $_POST['txtUsuario'];
            $contrasena = $_POST['txtContrasena'];
            $correo = $_POST['txtCorreo'];
            $usuarioModel->insertUsuario($usuario, $contrasena, $correo);
            break;
        case 2: //UPDATE TO DB
            $usuarioModel->updateUsuario();
            break;
        case 3: //DELETE TO DB
            echo $_POST['opc'];
            break;

        case 4: //SELECT TO DB
            $usuario = $usuarioModel->selectUsuarioUsuario($_POST['txtUsuario'], md5($_POST['txtContrasena']));

            if ($usuario->recordCount() > 0) {
                $_SESSION['id_usuario'] = $usuario->fields[0];
                $_SESSION['usuario'] = $usuario->fields[1];
                $_SESSION['usuarioNombre'] = $usuario->fields[2];
                header('Location: ../views/index.php');

            } else {
                echo 'NO';
                $_SESSION['res'] = 'n';
                header('Location: ../index.php');
            }
            break;
        case 5:
            echo 'RES';
            break;


    }
} else {

    header('Location: ../index.html');
}
?>