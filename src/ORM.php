<?php 
namespace MisClases;

require_once "db.php";


//class ORM
abstract class ORM
{
    protected $db;
    protected $Tabla;
    protected $Dir;
    protected $list = array();


    public function __construct()
    {
        $this->db = new BaseDatos();
    }


    public function select($query) {
        return $this->db->getConexion()->query($query);
    }


    public function Todos()
    {   
        $this->db->conectar();
        $list = $this->select("SELECT * from " . $this->Tabla);
        $this->db->desconectar();
        return $list;
    }


    public function insert($array_colum, $array_value)
    {
        $this->db->conectar();
        $query = sprintf("insert into %s (", $this->Tabla); 
        $aux_column = '';
        $aux_value = '';
        $i = 0;
        //
        while ($i < count($array_colum) - 1) {
            $aux_column = $aux_column . $array_colum[$i]     . ", ";
            $aux_value = $aux_value . $this->Comillas($array_value[$i]) . ", ";
            $i++;   
        }
        $aux_column = $aux_column . $array_colum[$i];
        $aux_value = $aux_value . $this->Comillas($array_value[$i]);

        // $query = insert into Tabla (column1, column2, etc...) values (Value1, Value2, ...);
        $query = $query . $aux_column . ") values ( " . $aux_value . ");" ;
        $this->select($query);
        $this->db->desconectar();
    }


    public function update($array_colum, $array_value, $id)
    {
        $this->db->conectar();
        $query = sprintf("update %s set ", $this->Tabla); 
        $aux_update = '';
        $i = 0;
        while ($i < count($array_colum) - 1) {
            $aux_update = $aux_update . $array_colum[$i] . ' = ' . 
                            $this->Comillas($array_value[$i]) . ", ";
            $i++;   
        }
        $aux_update = $aux_update . $array_colum[$i] . ' = ' . 
                            $this->Comillas($array_value[$i]);

        // $query = update Tabla set column1=Value, column2=Value,..., columnN = ValueN 
        //          where id = $id;
        $query = $query . $aux_update . " where id = " . $id . ";";
        $this->select($query);
        $this->db->desconectar();
    }    


    public function delete($id) 
    {   
        $this->db->conectar();
        $query = sprintf("delete from %s where id = %s ", $this->Tabla, $id); 

        $list = $this->select($query);
        $this->db->desconectar();
    }


    public function buscarPorId($id)
    {   
        $this->db->conectar();
        $query = sprintf("select * from %s where id = %s ", $this->Tabla, $id);         
        $list = $this->select($query);
        $this->db->desconectar();
        return $list;
    }


    public function buscarPorColumna($column, $value)
    {   
        $this->db->conectar();
        $query = "select * from " . 
            $this->Tabla . " where " . $column . " LIKE %" . $value . "%;";
            //$this->Tabla . " where " . $column . " LIKE %" . $this->Comillas($value) . "%;";            
        // select * from TABLA where column LIKE %value%;'    
        $list = $this->select($query);
        $this->db->desconectar();        
        return $list;
    }


    private function Comillas($valor)
    {
        if (!is_numeric($valor)) {
            $valor = "'" . \mysqli_real_escape_string($this->db->getConexion(), $valor) . "'";
        }
        return $valor;
    }
}
