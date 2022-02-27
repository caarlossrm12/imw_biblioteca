<?php

require "../../vendor/autoload.php";
require "../BaseDeDatos.php";
use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);



$id = $_REQUEST['id'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;



// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;


    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO categorias (nombre) VALUES (:nombre)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'nombre' => $nombre,

        )
    );
    // Redireccionamos a Leer
    header('Location: index.php');

} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM categorias WHERE id = :id;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id" => $id
        ]
    );
}

// Obtiene un resultado
$categorias = $miConsulta->fetch();

try {
    echo $blade->run("categorias.nuevo",
        [
            "categorias" => $categorias
        ]);
} catch (Exception $e) {
}
