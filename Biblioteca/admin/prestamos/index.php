<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require "../BaseDeDatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM prestamos WHERE id LIKE CONCAT("%", :id, "%")');
    $miConsulta->execute(['id' => $id]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM prestamos;');
    $miConsulta->execute();
}



// Leer entradas.
$prestamos = $miConsulta->fetchAll();


echo $blade->run("prestamos.index",
    [
        "prestamos" => $prestamos
    ]);

?>

