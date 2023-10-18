<?php
require_once '../models/conexion.php';
require_once '../models/plataformaModel.php';
require_once '../assets/adodb5/adodb.inc.php';

$plataformaModel = new PlataformaModel();
$resul = "";
if (isset($_GET['opc'])) {

    switch ($_GET['opc']) {
        case 1: //INSERT TO DB
            if (isset($_POST["Nuevo"])) {
                if (isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) {

                    $imagen = basename($_FILES["file"]["name"]);
                    $modelo = $_POST['txtModelo'];
                    $descripcion = $_POST['txtDescripcion'];
                    $id_marca = $_POST['marcas'];
                    $id_tipo = $_POST['tipos'];
                    $cantidad = $_POST['txtCantidad'];
                    $precio = $_POST['txtPrecio'];
                    $costo = $_POST['txtCosto'];

                    $queryRes = $plataformaModel->insertPlataforma($modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo);


                    $plataforma = $plataformaModel->ultimoModelo();
                    $imgNum = $plataforma->fields[0] + 1;

                    $uploadDir = '../assets/images/plataformas/' . $imgNum;
                    if (!file_exists($uploadDir)) {
                        // Verificar si la carpeta no existe

                        if (mkdir($uploadDir, 0777, true)) {
                            // Crear la carpeta si no existe
                            echo "La carpeta $uploadDir ha sido creada con éxito.";
                        } else {
                            // No se pudo crear la carpeta
                            echo "No se pudo crear la carpeta $uploadDir.";
                        }
                    } else {
                        // La carpeta ya existe
                        echo "La carpeta $uploadDir ya existe.";
                    }


                    $uploadDir = $uploadDir . "/"; // Directorio donde se guardarán las imágenes
                    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

                    // Verifica si el archivo es una imagen válida
                    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

                    if (in_array($imageFileType, $allowedExtensions)) {
                        // Mueve el archivo al directorio de carga
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
                            echo "La imagen se ha subido con éxito.";
                            if ($queryRes === true) {
                                $_SESSION['insertPlataforma'] = 's';
                                header("Location: ../views/crudPlataforma.php");
                            } else {
                                $_SESSION['insertPlataforma'] = 'n';
                                header("Location: ../views/crudPlataforma.php?info=$queryRes");
                                echo 'NO SE INSERTO';
                            }
                        } else {
                            echo "Error al subir la imagen.";
                        }
                    } else {
                        $_SESSION['insertPlataforma'] = "nc";
                        echo 'NO COMPATIBLE';
                        header("Location: ../views/crudPlataforma.php");
                    }

                } else {
                    $_SESSION['insertPlataforma'] = 'sa';
                    header("Location: ../views/crudPlataforma.php");
                    //echo "No se ha seleccionado ningún archivo.";
                }

            } else {
                echo 'NO SE DIO EN NUEVO';
            }
            break;
        case 2: //UPDATE RESTAR CANTIDAD 
            $id_modelo = $_POST['txtIdModelo'];
            $rs = $plataformaModel->selectIdPlataforma($id_modelo);
            $modelo = $rs->fields[1];
            $descripcion = $rs->fields[2];
            $id_marca = $rs->fields[3];
            $imagen = $rs->fields[4];
            $id_tipo = $rs->fields[5];
            $cantidad = $rs->fields[6];
            $precio = $rs->fields[7];
            $costo = $rs->fields[8];

            if ($cantidad >= $_POST['txtCantidad']) {
                echo 'Cantidad POST' . $_POST['txtCantidad'] . '\n';
                echo '$cantidad' . $cantidad;
                $cantidad = $cantidad - $_POST['txtCantidad'];
                echo 'Cantidad restada: ' . $cantidad;

                $queryRes = $plataformaModel->updatePlataforma($id_modelo, $modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo);

                if ($queryRes) {
                    $_SESSION['updatePlataforma'] = 's';
                    header("Location: ../views/plataformaDetalle.php?id=" . $id_modelo);
                } else {
                    $_SESSION['updatePlataforma'] = 'n';
                    header("Location: ../views/plataformaDetalle.php?id=" . $id_modelo);

                }
            } else {
                $_SESSION['updatePlataforma'] = 'sin';
                header("Location: ../views/plataformaDetalle.php?id=" . $id_modelo);
                // echo 'Stock insuficiente';
            }
            break;
        case 3: //DELETE TO DB
            $resDelete = $plataformaModel->deletePlataforma($_GET['id']);
            if ($resDelete) {
                $_SESSION['deletePlataforma'] = 's';
                header("Location: ../views/crudPlataforma.php");
            } else {
                $_SESSION['deletePlataforma'] = 'n';
                header("Location: ../views/crudPlataforma.php");
            }
            break;
        case 4: //SELECT TO DB
            // echo getPlataformas($plataformaModel);
            break;
        case 5:
            echo 'RES';
            break;
        case 6:
            if (isset($_POST["Actualizar"])) {

                if (isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) {
                    echo $uploadDir = "../assets/images/plataformas/" . $_POST['txtIdModelo'] . "/"; // Directorio donde se guardarán las imágenes
                    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);
                    $imagen = basename($_FILES["file"]["name"]);
                    // Verifica si el archivo es una imagen válida
                    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

                    if (in_array($imageFileType, $allowedExtensions)) {
                        // Mueve el archivo al directorio de carga
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
                            echo "La imagen se ha subido con éxito.";

                            $id_modelo = $_POST['txtIdModelo'];
                            $modelo = $_POST['txtModelo'];
                            $descripcion = $_POST['txtDescripcion'];
                            $id_marca = $_POST['marcas'];
                            $id_tipo = $_POST['tipos'];
                            $cantidad = $_POST['txtCantidad'];
                            $precio = $_POST['txtPrecio'];
                            $costo = $_POST['txtCosto'];

                            $queryRes = $plataformaModel->updatePlataforma($id_modelo, $modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo);

                            if ($queryRes) {
                                $_SESSION['modificarPlataforma'] = 's';
                                header("Location: ../views/crudPlataforma.php");
                            } else {
                                $_SESSION['modificarPlataforma'] = 'n';
                                header("Location: ../views/crudPlataforma.php");
                            }
                        } else {
                            echo "Error al subir la imagen.";
                        }
                    } else {
                        echo "Solo se permiten archivos de imagen (jpg, jpeg, png, gif).";
                    }

                } else {
                    echo "No se ha seleccionado ningún archivo.";
                    $id_modelo = $_POST['txtIdModelo'];
                    $modelo = $_POST['txtModelo'];
                    $descripcion = $_POST['txtDescripcion'];
                    $id_marca = $_POST['marcas'];
                    $id_tipo = $_POST['tipos'];
                    echo $cantidad = $_POST['txtCantidad'];
                    echo $precio = $_POST['txtPrecio'];
                    echo $costo = $_POST['txtCosto'];

                    $plataformaImagen = $plataformaModel->selectIdPlataforma($id_modelo);

                    $imagen = $plataformaImagen->fields[4];

                    $queryRes = $plataformaModel->updatePlataforma($id_modelo, $modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo);
                    if ($queryRes) {
                        $_SESSION['modificarPlataforma'] = 's';
                        header("Location: ../views/crudPlataforma.php");
                    } else {
                        $_SESSION['modificarPlataforma'] = 'n';
                        header("Location: ../views/crudPlataforma.php");
                    }
                }

            } else {
                echo 'NO SE DIO EN ACTUALIZAR';
            }

            break;
        case 10: //OBTIENE LA INFO DE UNA PLATAFORMA EN ESPECIAL
            $id_modelo = $_GET['id'];
            $resul = infoPlataforma($plataformaModel, $id_modelo);
            break;


    }
}


function getPlataformasTabla($plataformaModel)
{
    $plataformas = $plataformaModel->getAllPlataformasTabla();
    $res = '';
    while (!$plataformas->EOF) {
        $res .= '<tr>
            <th scope="row">' . $plataformas->fields[0] . '</th>
            <td>' . $plataformas->fields[1] . '</td>
            <td>' . $plataformas->fields[9] . '</td>
            <td>' . $plataformas->fields[10] . '</td>
            <td>' . $plataformas->fields[6] . '</td>
            <td>' . $plataformas->fields[7] . '</td>
            <td>' . $plataformas->fields[8] . '</td>
            <td>  <a href="../assets/images/plataformas/' . $plataformas->fields[0] . '/' . $plataformas->fields[4] . '">' . $plataformas->fields[4] . '</a></td>
            <td>' . $plataformas->fields[2] . '</td>
            <td>
                <a href="#" class="btn btn-success"
                    onclick="editar( ' . $plataformas->fields[0] . ', \'' . $plataformas->fields[1] . '\', \'' . $plataformas->fields[3] . '\', \'' . $plataformas->fields[5] . '\', \'' . $plataformas->fields[6] . '\', \'' . $plataformas->fields[7] . '\', \'' . $plataformas->fields[8] . '\', \'' . $plataformas->fields[4] . '\', \'' . $plataformas->fields[2] . '\')">Editar</a>
            </td>
            <td>
            <a href="../controllers/plataformaController.php?opc=3&id=' . $plataformas->fields[0] . '" class="btn btn-danger">Eliminar</a>

            </td>
        </tr>';

        $plataformas->MoveNext();
    }
    return $res;
}


function getCardsPlataformas($plataformaModel)
{
    $plataformas = $plataformaModel->getAllPlataformasCards();
    $res = '';
    while (!$plataformas->EOF) {
        $res .= '<div class="col-md-4 col-sm-6 cards">
        <div class="box17">
            <img class="pic-1" src="../assets/images/plataformas/' . $plataformas->fields[1] . '/' . $plataformas->fields[5] . '">
            <ul class="icon">
                <li><a href="../views/plataformaDetalle.php?id=' . $plataformas->fields[1] . '"><i class="fa-solid fa-info"></i></a></li>
            </ul>
            
            <div class="box-content">
                <h3 class="title">' . $plataformas->fields[0] . '</h3>
                <span class="post">Cantidad: ' . $plataformas->fields[2] . '</span>
                <span class="post">' . $plataformas->fields[3] . '</span>
                <span class="post texto-limitado">' . $plataformas->fields[4] . '</span>
            </div>
            
        </div>

        <a href="#" class="btn btn-nuevo-usuario w-100 m-2"
                    onclick="addCarrito( ' . $_SESSION['id_usuario'] . ', \'' . $plataformas->fields[1] . '\', \'' . $plataformas->fields[6] . '\')"><i class="fa-sharp fa-solid fa-cart-plus"></i></a>
                    
                    <!-- <button type="button" class="btn btn-outline-secondary btn-lg m-2 w-100" data-bs-toggle="modal" data-bs-target="#agregarCarritoP" oncli><i class="fa-sharp fa-solid fa-cart-plus"></i></button> -->
    </div>';

        $plataformas->MoveNext();
    }
    return $res;
}




function infoPlataforma($plataformaModel, $id_modelo)
{
    $plataformas = $plataformaModel->selectPlataforma($id_modelo);
    $res = '';
    if ($plataformas) {
        $res .= '<div class="container p-5">
            <div class="row mt-4">
                <div class="col-lg-4 text-center border-right border-secondery">
                    <div class="tab-content row h-100 d-flex justify-content-center align-items-center" id="myTabContent">
                        <div class="tab-pane fade show active col-lg-12" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <img class="img-fluid"
                                src="../assets/images/plataformas/' . $plataformas->fields[1] . '/' . $plataformas->fields[5] . '" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5>
                    ' . $plataformas->fields[0] . ' - ' . $plataformas->fields[3] . '
                    </h5>
                    <h3>
                        $' . $plataformas->fields[6] . '
                    </h3>
                    <p>
                        Unidades disponibles: ' . $plataformas->fields[2] . '
                    </p>
                    <p class="pb-2">
                    ' . $plataformas->fields[4] . '
                    </p>
                </div>
            </div>
            <button type="button" class="btn btn-lg btn-nuevo-usuario" data-bs-toggle="modal" data-bs-target="#comprarP">Comprar</button>

            <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#agregarCarrito">Agregar al Carrito</button>
        </div>
        ';

    } else {
        $res = 'No se pudo cargar la info';
    }

    return $res;

}


function getMarcas($plataformaModel)
{
    $marcas = $plataformaModel->getMarcas();
    $res = '';
    $res .= '<select name="marcas" id="marcas">
    <option value="0">Selecciona una marca</option>';
    while (!$marcas->EOF) {
        $res .= '<option value="' . $marcas->fields[0] . '">' . $marcas->fields[1] . '</option>';
        $marcas->MoveNext();
    }
    $res .= '</select>';
    return $res;
}

function getTipos($plataformaModel)
{
    $tipos = $plataformaModel->getTipos();
    $res = '';
    $res .= '<select name="tipos" id="tipos">
    <option value="0">Selecciona un tipo</option>';
    while (!$tipos->EOF) {
        $res .= '<option value="' . $tipos->fields[0] . '">' . $tipos->fields[1] . '</option>';
        $tipos->MoveNext();
    }
    $res .= '</select>';
    return $res;
}
?>