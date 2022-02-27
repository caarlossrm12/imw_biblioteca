<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require "../BaseDeDatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM usuarios WHERE username LIKE CONCAT("%", :username, "%")');
    $miConsulta->execute(['username' => $username]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM usuarios;');
    $miConsulta->execute();
}



// Leer entradas.
$usuarios = $miConsulta->fetchAll();


echo $blade->run("usuarios.index",
    [
        "usuarios" => $usuarios
    ]);

?>
