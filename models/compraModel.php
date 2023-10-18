<?php
// session_start();
class CompraModel
{
    private $id_compra;
    private $id_usuario;
    private $fecha;

    private $db;

    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }


    public function insertarCompra($id_usuario, $fecha)
    {
        $table = 'compra';
        $record = array();
        $record['id_usuario'] = $id_usuario;
        $record['fecha'] = $fecha;
        $rs = $this->db->autoExecute($table, $record, 'INSERT');
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        } else {
            $rs = $this->db->Insert_ID();
        }
        echo $rs;
    }

    public function updateCompra($id_compra, $id_usuario, $fecha)
    {
        $table = 'compra';
        $record = array();
        $record['id_compra'] = $id_compra;
        $record['id_usuario'] = $id_usuario;
        $record['fecha'] = $fecha;
        $rs = $this->db->autoExecute($table, $record, 'UPDATE', 'id_compra =' . $_POST['txtIdCompra'] . ' AND id_usuario =' . $id_usuario);
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function deleteCompra($id_compra, $id_usuario)
    {
        $query = "DELETE FROM compra WHERE id_compra = " . $id_compra . ' AND id_usuario =' . $id_usuario;
        $rs = $this->db->Execute($query);
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function insertConSelect($id_usuario, $id_modelo, $cantidad, $precio, $descuento)
    {
        $query = "CALL registrarCompra(?,?,?,?,?)";
        $rs = $this->db->Execute($query, array($id_usuario, $id_modelo, $cantidad, $precio, $descuento));

        if (!$rs) {
            die("Error al ejecutar el procedimiento almacenado de compra: " . $this->db->ErrorMsg());
        }
        return $rs;
    }

    public function selectCompraId($id_compra, $id_usuario)
    {
        $query = "SELECT * FROM compra WHERE id_compra = " . $id_compra . ' AND id_modelo =' . $id_usuario;
        $rs = $this->db->Execute($query);
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function allCompraDetalle()
    {
        $query = "SELECT * FROM compra";
        $rs = $this->db->Execute($query);
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function comprarCarrito($id_usuario)
    {
        $query = "CALL comprarCarrito(?)";
        $rs = $this->db->Execute($query, array($id_usuario));

        if (!$rs) {
            die("Error al ejecutar el procedimiento comprarCarrito: " . $this->db->ErrorMsg());
        }
        return $rs;
    }
}

?>