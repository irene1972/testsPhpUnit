<?php session_start() ; ?>
<?php
    // Imprimo el Header de la pagina
    ob_start(); 
    include('head.tpl'); 
    $page = ob_get_clean();
    $page = str_replace('{Titulo_Pagina}', 'Aprendiendo POO', $page);
    echo $page;
    // Fin Imprimo el Header de la pagina
?>
<?php
    require_once(dirname(__FILE__).'/../src/Remeras.php');
    $remeras = new MisClases\Remeras();
?>
 
<?php
    if (!((isset($_POST["oculto"]) && $_POST['oculto']=='oculto')))
    {
      if (isset($_POST["Nombre"])) { ?><div style="color:red;">Nombre no puede ser vacio</div><?php }
    } else {
      // Rand STR genera estring randon para poder subir varias imagenes con el mismo nombre
      $rand_str = substr( md5(rand()), 0, 30);
      $name_file = $rand_str . trim($_FILES['Image']['name']);
      $remeras->insert(
        array("Nombre", "Descripcion", "Link", "Image", "Talle", "Color","Precio"), 
        array($_POST["Nombre"], $_POST["Descripcion"], $_POST["Link"], 
              $name_file, $_POST["Talle"], $_POST["Color"], $_POST["Precio"])
        );
      $target_path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].$remeras->Dir;
      $target_path = $target_path . basename($name_file); 
      if(move_uploaded_file($_FILES['Image']['tmp_name'], $target_path)) 
        { echo "El archivo ". basename( $_FILES['Image']['name']). " ha sido subido";
      } else{
        echo "Ha ocurrido un error, trate de nuevo!";
      }
    }
?>
    <p> Inserte un Remera </p>
        <form method="post" enctype="multipart/form-data">
          Nombre:<br>
          <input type="text" name="Nombre"><br>
          Descripcion:<br>
          <input type="text" name="Descripcion"><br>
          Link:<br>
          <input type="text" name="Link"><br>
          Talle:<br>
          <input type="text" name="Talle"><br>
          Color:<br>
          <input type="text" name="Color"><br>
          Image:<br>
          <input type="file" name="Image"><br>
          Precio:<br>
          <input type="text" name="Precio">
          <input type="hidden" name="oculto" value="oculto">
          <br>
          <input type="submit" value="Nuevo">
        </form>

<?php
    // Imprimo el footer de la pagina
    ob_start(); 
    include('footer.tpl'); 
    $page = ob_get_clean();
    echo $page;
?>