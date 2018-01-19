<?php 
/* Productos */
namespace MisClases;

require_once "ORM.php";
require_once "Producto.php";


class Productos extends ORM
{
    const TABLENAME = 'Productos';
    const DIR = '/files/Productos/';
    public $Dir;
    protected $listProduct = [];

    public function __construct()
    {
        parent::__construct();
        $this->Tabla = self::TABLENAME;
        $this->Dir = self::DIR;
    }


    public function Todos() 
    {   
        $list = parent::Todos();
        while ($row = mysqli_fetch_object($list)) {
                $miProducto = new Producto($row->id, $row->Nombre, $row->Descripcion,
                                           $row->Link, $row->Image, $row->Precio);
                $this->listProduct[]  = $miProducto;
            }
        return $this->listProduct;
    }


    public function __tostring() : STRING 
    {
        $this->Todos();
        $out = "<table class='Tabla Productos'> \n";
        $out = $out . "<tr><td>Id</td><td>Nombre</td><td>Descripcion</td><td>Link</td><td>Image</td><td>Precio</td></tr> \n";
        foreach ($this->listProduct as $product) {
            $out = $out . $product->showRow($this->Dir);
        }
        $out = $out.'</table>';
        return $out; 
    }


    public function AdminListar() : STRING 
    {
        $this->Todos();
        $out = "<table class='Tabla Productos'> \n";
        $out = $out . "<tr><td>Id</td><td>Nombre</td><td>Descripcion</td><td>Link</td><td>Image</td><td>Precio</td><td>Editar</td><td>Eliminar</td></tr> \n";
        foreach ($this->listProduct as $product) {
            $out = $out . $product->AdminshowRow($this->Dir);
        }
        $out = $out.'</table>';
        return $out; 
    }
}
