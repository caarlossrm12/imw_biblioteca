<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require "../BaseDeDatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM editorial WHERE nombre LIKE CONCAT("%", :nombre, "%")');
    $miConsulta->execute(['nombre' => $nombre]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM editorial;');
    $miConsulta->execute();
}



// Leer entradas.
$editorial = $miConsulta->fetchAll();


echo $blade->run("editorial.index",
    [
        "editorial" => $editorial
    ]);

?>

