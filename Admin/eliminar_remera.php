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
<?php $remeras->delete($_GET["id"]); ?>
   <h3>Remera con Id:<?php echo $_GET["id"]?> Eliminado</h3>
<?php
    // Imprimo el footer de la pagina
    ob_start(); 
    include('footer.tpl'); 
    $page = ob_get_clean();
    echo $page;
?>

