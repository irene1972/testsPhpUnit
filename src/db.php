<?php
namespace MisClases;


require_once "config.php";



class BaseDatos
{
    private $conexion;

    public function getConexion()
    {
        return $this->conexion;
    }

    final function conectar()
    {
        $this->conexion = new \mysqli(HOST, USER, PASS, DBNAME);
        if (mysqli_connect_errno()) {
            die('Lo sentimos, no se ha podido conectar con MySQL: '.mysql_error());
        }
        return true;
    }


    public function desconectar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }

    public function __destroy() 
    {
        $this->desconectar();
    }
}
