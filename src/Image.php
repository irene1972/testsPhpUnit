<?php 
namespace MisClases;


class Image
{
    const DEFAULT_NAME = 'default.jpg';
    const DEFAULT_DIR = '/files/';    
    const DEFAULT_WIDTH = 120;
    const DEFAULT_HEIGHT= 120;
    const DEFAULT_ALT= '';
    const DEFAULT_CSS_CLASS= '';
    protected $Directorio;
    protected $FileName;
    protected $Width;
    protected $Height;
    protected $Alt;
    protected $CssClass;

    public function __construct()
    {
        $this->FileName = self::DEFAULT_NAME;
        $this->Width = self::DEFAULT_WIDTH;
        $this->Height = self::DEFAULT_HEIGHT;
        $this->Alt = self::DEFAULT_ALT;
        $this->CssClass = self::DEFAULT_CSS_CLASS;
        $this->Directorio = self::DEFAULT_DIR;
    }

    public function setFileName($newFileName)
    {
        $this->FileName = $newFileName;
    }


    public function setDirectorio($newDirectorio)
    {
        $this->Directorio = $newDirectorio;
    }


    public function getDirectorio($newFileName)
    {
        return $this->Directorio;
    }


    public function setWidth($newWidth)
    {
        $this->Width = $newWidth;
    }


    public function setHeight($newHeight)
    {
        $this->Height = $newHeight;
    }


    public function setAlt($newAlt)
    {
        $this->Alt = $newAlt;
    }


    public function setClass($newClass)
    {
        $this->CssClass = $newClass;
    }


    public function getUrl(): STRING
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
        $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        return $protocol.$_SERVER['HTTP_HOST'].$this->Directorio.$this->FileName;
    }

    public function getImg(): STRING
    {
        $aux = $this->getUrl();
        $aux = "<img src=\"" . $aux . "\" ";
        // aux = (condicion) ? return cuando es verdadero : return cuando no es verdadero
        $aux = ($this->Alt == '') ? $aux : $aux . $aux . "alt='$this->alt' ";
        if ($this->CssClass == '') 
        {
            $aux = ($this->Height == '') ? $aux : $aux . "height='$this->Height'";
            $aux = ($this->Width == '') ? $aux : $aux . "width='$this->Width'";
        } else {
            $aux = ($this->CssClass == '') ? $aux : $aux . "class='$this->cssClass' ";
        }
        $aux = $aux.' ></img>';
        return $aux;
    }
    

    public function __tostring(): STRING
    {
        return getImg();
    }
}
