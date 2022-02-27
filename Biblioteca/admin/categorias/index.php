<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require "../BaseDeDatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM categorias WHERE nombre LIKE CONCAT("%", :nombre, "%")');
    $miConsulta->execute(['nombre' => $nombre]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM categorias;');
    $miConsulta->execute();
}



// Leer entradas.
$categorias = $miConsulta->fetchAll();


echo $blade->run("categorias.index",
    [
        "categorias" => $categorias
    ]);

?>

