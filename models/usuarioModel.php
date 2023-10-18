<?php
// session_start();
class UsuarioModel
{
    private $id_usuario;
    private $usuario;
    private $contrasena;
    private $correo;

    private $db;

    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }


    public function insertUsuario($usuario, $contrasena, $correo)
    {
        $table = 'usuario';
        $record = array();
        $record['usuario'] = $usuario;
        $record['contrasena'] = $contrasena;
        $record['correo'] = $correo;
        $this->db->autoExecute($table, $record, 'INSERT');
        $_SESSION['res'] = 'insertado';
        header('Location: ../views/usuario.php');

    }

    public function updateUsuario()
    {
        $table = 'usuario';
        $record = array();
        $record['usuario'] = $_POST['txtUsuario'];
        $record['contrasena'] = md5($_POST['txtContrasena']);
        $record['correo'] = $_POST['txtCorreo'];
        $this->db->autoExecute($table, $record, 'UPDATE', 'id_usuario=' . $_POST['txtIdUsuario']);
        $_SESSION['res'] = 'actualizado';
        header('Location: ../views/usuario.php');
    }

    public function deleteUsuario()
    {
        $query = "DELETE FROM usuario WHERE id_usuario = " . $_POST['id'];
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function selectUsuarioId($id)
    {
        $query = "SELECT * FROM usuario WHERE id_usuario=" . $id;
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function selectUsuarioUsuario($usuario, $contrasena)
    {
        $query = "SELECT u.id_usuario, u.usuario, CONCAT(p.nombre ,' ', p.primer_apellido) AS nombre
        FROM usuario u
                 INNER JOIN persona p on u.id_usuario = p.id_usuario 
                    WHERE usuario='" . $usuario . "' AND contrasena = '" . $contrasena . "'";
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function allUsuario()
    {
        $query = "SELECT * FROM usuario";
        $rs = $this->db->Execute($query);
        // print_r($rs->getRows());
        return $rs;
    }
}

?>