<?php 
/* Productos */
namespace MisClases;

require_once "ORM.php";
require_once "Remera.php";


class Remeras extends ORM
{
    const TABLENAME = 'Remeras';
    const DIR = '/files/Remeras/';
    public $Dir;
    protected $listRemeras = [];

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
                $miRemera = new Remera($row->id, $row->Nombre, $row->Descripcion,
                                           $row->Link, $row->Image, $row->Talle, $row->Color, 
                                           $row->Precio);
                $this->listRemeras[]  = $miRemera;
            }
        return $this->listRemeras;
    }


    public function __tostring() : STRING 
    {
        $this->Todos();
        $out = "<table class='Tabla Remeras'> \n";
        $out = $out . "<tr><td>Id</td><td>Nombre</td><td>Descripcion</td><td>Link</td><td>Image</td><td>Talle</td><td>Color</td><td>Precio</td></tr> \n";
        foreach ($this->listRemeras as $remera) {
            $out = $out . $remera->showRow($this->Dir);
        }
        $out = $out.'</table>';
        return $out; 
    }


    public function AdminListar() : STRING 
    {
        $this->Todos();
        $out = "<table class='Tabla Productos'> \n";
        $out = $out . "<tr><td>Id</td><td>Nombre</td><td>Descripcion</td><td>Link</td><td>Image</td><td>Talle</td><td>Color</td><td>Precio</td><td>Editar</td><td>Eliminar</td></tr> \n";
        foreach ($this->listRemeras as $remera) {
            $out = $out . $remera->AdminshowRow($this->Dir);
        }
        $out = $out.'</table>';
        return $out; 
    }
}
