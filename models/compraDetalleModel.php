<?php
// session_start();
class CompraDetalleModel
{
    private $id_compra;
    private $id_modelo;
    private $cantidad;
    private $precio;
    private $descuento;

    private $db;

    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }


    public function insertarCompraDetalle($id_compra, $id_modelo, $cantidad, $precio, $descuento)
    {
        $table = 'compra_detalle';
        $record = array();
        $record['id_compra'] = $id_compra;
        $record['id_modelo'] = $id_modelo;
        $record['cantidad'] = $cantidad;
        $record['precio'] = $precio;
        $record['descuento'] = $descuento;
        $this->db->autoExecute($table, $record, 'INSERT');
        $_SESSION['resCompraDetalle'] = 'insertado';
        header('Location: ../views/usuario.php');

    }

    public function updateCompraDetalle($id_compra, $id_modelo, $cantidad, $precio, $descuento)
    {
        $table = 'compra_detalle';
        $record = array();
        $record['id_compra'] = $id_compra;
        $record['id_modelo'] = $id_modelo;
        $record['cantidad'] = $cantidad;
        $record['precio'] = $precio;
        $record['descuento'] = $descuento;
        $this->db->autoExecute($table, $record, 'UPDATE', 'id_compra=' . $_POST['txtIdCompra'] . ' AND id_modelo =' . $id_modelo);
        $_SESSION['resCompra'] = 'actualizado';
        header('Location: ../views/usuario.php');
    }

    public function deleteCompraDetalle($id_compra, $id_modelo)
    {
        $query = "DELETE FROM compra_detalle WHERE id_compra = " . $id_compra . ' AND id_modelo =' . $id_modelo;
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function selectCompraDetalleId($id_compra, $id_modelo)
    {
        $query = "SELECT * FROM compra_detalle WHERE id_compra = " . $id_compra . ' AND id_modelo =' . $id_modelo;
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function allCompraDetalle()
    {
        $query = "SELECT * FROM compra_detalle";
        $rs = $this->db->Execute($query);
        return $rs;
    }
}

?>