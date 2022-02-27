<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require "../BaseDeDatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM sanciones WHERE id LIKE CONCAT("%", :id, "%")');
    $miConsulta->execute(['id' => $id]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM sanciones;');
    $miConsulta->execute();
}



// Leer entradas.
$sanciones = $miConsulta->fetchAll();


echo $blade->run("sanciones.index",
    [
        "sanciones" => $sanciones
    ]);

?>

