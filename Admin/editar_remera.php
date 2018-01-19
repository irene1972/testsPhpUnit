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
      
      if ($_POST["Cambiar"]) {
	      $remeras->update(
	        array("Nombre", "Descripcion", "Link", "Image", "Talle", "Color","Precio"), 
	        array($_POST["Nombre"], $_POST["Descripcion"], $_POST["Link"], $name_file, 
                $_POST["Talle"], $_POST["Color"], $_POST["Precio"]), $_POST["id"]
	        );

	      $target_path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].$remeras->Dir;
	      $target_path = $target_path . basename($name_file); 
	      if(move_uploaded_file($_FILES['Image']['tmp_name'], $target_path)) 
	        { echo "El archivo ". basename( $_FILES['Image']['name']). " ha sido subido";
	      } else{
	        echo "Ha ocurrido un error, trate de nuevo!";
	      }
      } else {
	      $remeras->update(
	        array("Nombre", "Descripcion", "Link", "Talle", "Color", "Precio"), 
	        array($_POST["Nombre"], $_POST["Descripcion"], $_POST["Link"], 
                $_POST["Talle"], $_POST["Color"], $_POST["Precio"]),$_POST["id"]
	        );
      }
    }
?>
	<?php
	$resultado = $remeras->buscarPorId($_GET["id"]);
	$remera = $resultado->fetch_assoc();

	//Armo ruta imagen
	$image_dir_path = $remeras->Dir;

    $img = new MisClases\Image();
    $img->setDirectorio($image_dir_path);
    $img->setFileName($remera['Image']);
	?>
    <p> Editar Remera </p>
        <form method="post" enctype="multipart/form-data">
          Nombre:<br>
          <input type="text" name="Nombre" 
          value="<?php echo $remera['Nombre'];?>"><br>
          Descripcion:<br>
          <input type="text" name="Descripcion"
          value="<?php echo $remera['Descripcion'];?>"><br>
          Link:<br>
          <input type="text" name="Link"
          value="<?php echo $remera['Link'];?>"><br>
          Talle:<br>
          <input type="text" name="Talle"
          value="<?php echo $remera['Talle'];?>"><br>
          Color:<br>
          <input type="text" name="Color"
          value="<?php echo $remera['Color'];?>"><br>
          Image:<br>
          <?php echo $img->getImg();?><br>
          <input type="checkbox" name="Cambiar" value="false">Cambiar Imagen<br>
          <input type="file" name="Image"><br>
          Precio:<br>
          <input type="text" name="Precio"
          value="<?php echo $remera['Precio'];?>"><br>
          <input type="hidden" name="id" 
          value="<?php echo $remera['id'];?>">
          <input type="hidden" name="oculto" value="oculto">
          <input type="submit" value="Submit">
        </form>

<?php
    // Imprimo el footer de la pagina
    ob_start(); 
    include('footer.tpl'); 
    $page = ob_get_clean();
    echo $page;
?>