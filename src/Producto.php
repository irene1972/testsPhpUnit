<?php 
/* Productos */
namespace MisClases;

require_once "Image.php";

class Producto
{
    protected $id;
    protected $nombre;
    protected $description;
    protected $link;
    protected $precio;
    protected $image;

    public function __construct($id, $nombre, $description, $link, $image, $precio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->description = $description;
        $this->link = $link;
        $this->precio = $precio;
        $this->image = $image;
    }


    public function showRow($directorio)
    {
        $img = new Image();
        $img->setDirectorio($directorio);
        $img->setFileName($this->image);
        $out = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>",
        $this->id,
        $this->nombre,
        $this->description,
        "<a href='$this->link'>$this->link</a>",
        $img->getImg(),
        $this->precio);
        return $out;
    }


    public function AdminshowRow($directorio)
    {
        $img = new Image();
        $img->setDirectorio($directorio);
        $img->setFileName($this->image);
        $out = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td></tr>",
        $this->id,
        $this->nombre,
        $this->description,
        "<a href='$this->link'>$this->link</a>",
        $img->getImg(),
        $this->precio,
        "<a href='editar_producto.php?id=" . $this->id . "'>Editar</a>",
        "<a href='eliminar_producto.php?id=" . $this->id . "'>Eliminar</a>");
        return $out;
    }
}

