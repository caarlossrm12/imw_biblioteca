<?php

require "../../vendor/autoload.php";
require "../BaseDeDatos.php";
use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);



$id = $_REQUEST['id'] ?? null;
$motivo = $_REQUEST['motivo'] ?? null;


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE sanciones SET id = :id, motivo = :motivo WHERE id = :id');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id' => $id,
            'motivo' => $motivo,

        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM sanciones WHERE id = :id');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id" => $id
        ]
    );
}

// Obtiene un resultado
$sanciones = $miConsulta->fetch();

try {
    echo $blade->run("sanciones.modificar",
        [
            "sanciones" => $sanciones
        ]);
} catch (Exception $e) {
}


