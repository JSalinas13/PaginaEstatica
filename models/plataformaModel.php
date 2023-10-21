<?php
//session_start();
class PlataformaModel
{
    private $no_economico;
    private $id_modelo;
    private $preventivo;
    private $cantidad;

    private $db;

    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }


    public function insertPlataforma($modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo)
    {
        $table = 'modelo';
        $record = array();
        $record['modelo'] = $modelo;
        $record['descripcion'] = $descripcion;
        $record['id_marca'] = $id_marca;
        $record['imagen'] = $imagen;
        $record['id_tipo'] = $id_tipo;
        $record['cantidad'] = $cantidad;
        $record['precio'] = $precio;
        $record['costo'] = $costo;
        $rs = $this->db->autoExecute($table, $record, 'INSERT');
        if ($rs === false) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function updatePlataforma($id_modelo, $modelo, $descripcion, $id_marca, $imagen, $id_tipo, $cantidad, $precio, $costo)
    {
        $table = 'modelo';
        $record = array();
        $record['modelo'] = $modelo;
        $record['descripcion'] = $descripcion;
        $record['id_marca'] = $id_marca;
        $record['imagen'] = $imagen;
        $record['id_tipo'] = $id_tipo;
        $record['cantidad'] = $cantidad;
        $record['precio'] = $precio;
        $record['costo'] = $costo;
        $res = $this->db->autoExecute($table, $record, 'UPDATE', 'id_modelo =' . $id_modelo);
        if ($res === false) {
            $res = $this->db->ErrorMsg();
        }
        return $res;
    }

    public function deletePlataforma($id_modelo)
    {
        $query = "DELETE FROM modelo WHERE id_modelo = " . $id_modelo;
        $rs = $this->db->Execute($query);

        if (!$rs) {
            $rs = $this->db->ErrorMsg();
        }
        return $rs;
    }

    public function selectIdPlataforma($id_modelo)
    {
        $query = "SELECT * FROM modelo WHERE id_modelo = " . $id_modelo;
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function selectPlataforma($id_modelo)
    {
        $query = "SELECT CONCAT(m.modelo, ' ', m2.marca) AS Plataforma,
        m.id_modelo,
        CASE
           WHEN m.cantidad IS NULL THEN 'Sin stock'
           WHEN m.cantidad = 0 THEN 'Sin stock'
           WHEN m.cantidad > 0 THEN m.cantidad
           END                         AS cantidad,
        t.tipo,
        m.descripcion,
        m.imagen,
        m.precio
 FROM modelo m
          INNER JOIN marca m2 on m.id_marca = m2.id_marca
          INNER JOIN tipo t on m.id_tipo = t.id_tipo
        WHERE m.id_modelo =" . $id_modelo;
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function getAllPlataformasCards()
    {
        $query = "SELECT 
        CONCAT(m.modelo, ' ', m2.marca) AS Plataforma,
        m.id_modelo,
        CASE
           WHEN m.cantidad IS NULL THEN 'Sin stock'
           WHEN m.cantidad = 0 THEN 'Sin stock'
           WHEN m.cantidad > 0 THEN m.cantidad
           END                         AS cantidad,
        t.tipo,
        LEFT(m.descripcion, 150),
        m.imagen,
        m.precio
 FROM modelo m
          INNER JOIN marca m2 on m.id_marca = m2.id_marca
          INNER JOIN tipo t on m.id_tipo = t.id_tipo
        ";
        $rs = $this->db->Execute($query);
        return $rs;
    }



    public function getAllPlataformas()
    {
        $query = "SELECT CONCAT(m.modelo, ' ', m2.marca) AS Plataforma,
        m.id_modelo,
        CASE
           WHEN m.cantidad IS NULL THEN 'Sin stock'
           WHEN m.cantidad = 0 THEN 'Sin stock'
           WHEN m.cantidad > 0 THEN m.cantidad
           END                         AS cantidad,
        t.tipo,
        m.descripcion, 150,
        m.imagen,
        m.precio
 FROM modelo m
          INNER JOIN marca m2 on m.id_marca = m2.id_marca
          INNER JOIN tipo t on m.id_tipo = t.id_tipo
        ";
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function getAllPlataformasTabla()
    {
        $query = "SELECT m.id_modelo,
        m.modelo,
        m.descripcion,
        m2.id_marca,
        m.imagen,
        t.id_tipo,
        CASE
            WHEN m.cantidad IS NULL THEN 'Sin stock'
            WHEN m.cantidad <= 0 THEN 'Sin stock'
            WHEN m.cantidad > 0 THEN m.cantidad
            END AS cantidad,
        m.precio,
        m.costo,
        m2.marca,
        t.tipo,
        CASE
            WHEN m.reorden IS NULL THEN 'Sin stock'
            WHEN m.reorden <= 0 THEN 'Sin stock'
            WHEN m.reorden > 0 THEN m.cantidad
            END AS cantidad
 FROM modelo m
          INNER JOIN marca m2 on m.id_marca = m2.id_marca
          INNER JOIN tipo t on m.id_tipo = t.id_tipo
          ORDER BY m.id_modelo ASC
        ";
        $rs = $this->db->Execute($query);
        return $rs;
    }
    public function getMarcas()
    {
        $query = "SELECT * FROM marca";
        $rs = $this->db->Execute($query);
        return $rs;
    }
    public function getTipos()
    {
        $query = "SELECT * FROM tipo";
        $rs = $this->db->Execute($query);
        return $rs;
    }

    public function ultimoModelo()
    {
        $query = "SELECT LAST_INSERT_ID()";
        $rs = $this->db->Execute($query);
        return $rs;
    }
}


?>