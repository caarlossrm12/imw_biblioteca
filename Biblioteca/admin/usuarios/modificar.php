<?php

require "../../vendor/autoload.php";
require "../BaseDeDatos.php";
use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);


$id = $_REQUEST['id'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;
$apellidos = $_REQUEST['apellidos'] ?? null;
$username = $_REQUEST['username'] ?? null;
$password = $_REQUEST['password'] ?? null;

$avatar = $_REQUEST['avatar'] ?? null;
$email = $_REQUEST['email'] ?? null;
$tipo = $_REQUEST['tipo'] ?? null;
$activo = $_REQUEST['activo'] ?? null;


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, username = :username, password = :password, avatar = :avatar, email = :email, tipo = :tipo, activo = :activo WHERE id = :id ');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'username' => $username,
            'password' => $password,

            'avatar' => $avatar,

            'email' => $email,
            'tipo' => $tipo,
            'activo' => $activo,


        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM usuarios WHERE id = :id;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id" => $id
        ]
    );
}

// Obtiene un resultado
$usuarios = $miConsulta->fetch();

try {
    echo $blade->run("usuarios.modificar",
        [
            "usuarios" => $usuarios
        ]);
} catch (Exception $e) {
}

