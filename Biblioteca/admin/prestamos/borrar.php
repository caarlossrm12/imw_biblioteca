<?php

session_start();

// Variables
include "../BaseDeDatos.php";

// Obtiene id del libro a borrar
$id = $_REQUEST['id'] ?? null;

// Prepara DELETE
$miConsulta = $miPDO->prepare('DELETE FROM prestamos WHERE id = :id');

// Ejecuta la sentencia SQL
$miConsulta->execute([
    "id" => $id
]);

$_SESSION["mensajes"] = "Préstamo eliminado correctamente.";

// Redireccionamos al PHP con todos los datos
header('Location: index.php');
