<?php 
namespace MisClases;

require_once "db.php";


//class ORM
class DolarCotizacion
{
    const API = 'http://ws.geeklab.com.ar/dolar/get-dolar-json.php';
    protected $Oficial;
    protected $Blue;


    public function __construct()
    {
        $data_in = self::API;
        $data_json = @file_get_contents($data_in);
        if(strlen($data_json)>0)
        {
          $data_out = json_decode($data_json,true);
         
          if(is_array($data_out))
          {
            $this->Oficial = $data_out['libre'];
            $this->Blue = $data_out['blue'];
          }
        }
    }

    public function ConvertirOficial($mount)
    {
        return $mount * $this->Oficial;
    }

    public function ConvertirBlue($mount) {
        return $mount * $this->Blue;
    }

}
