
<?php

require "../../vendor/autoload.php";
require "../BaseDeDatos.php";
use eftec\bladeone\BladeOne;

$views =  '../../views';
$cache =  '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $id = $_REQUEST['id'] ?? null;
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $username = $_REQUEST['username'] ?? null;    
    $password = $_REQUEST['password'] ?? null;

    $avatar = $_REQUEST['avatar'] ?? '';
  //  $avatar = $_FILES['avatar']['name'];
   //   $tipos = $_FILES['avatar']['type'];
    //  $tamano = $_FILES['avatar']['size'];

    //  if (!empty($avatar) && ($_FILES['avatar']['size'] <= 200000000)) {
     //     if (($_FILES['avatar']['type'] === "image/gif")
      //        || ($_FILES['avatar']['type'] === "image/jpeg")
      //        || ($_FILES['avatar']['type'] === "image/jpg")
        //      || ($_FILES['avatar']['type'] === "image/png")) {
       //   $directorio = '../../imagenes/usuarios/';
        //  move_uploaded_file($_FILES['avatar']['tmp_name'], $directorio . $avatar);

    //  }
       //   else {
      //        echo "Formato de imagen incorrecto";
      //    }
     // }
     // else if ($avatar === !NULL) {
     //     echo "La imagen es demasiado grande";
   //   }

    $email = $_REQUEST['email'] ?? null;
    $tipo = $_REQUEST['tipo'] ?? null;
    $activo = $_REQUEST['activo'] ?? null;

    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO usuarios (nombre, apellidos, username, password, avatar, email, tipo, activo) VALUES (:nombre, :apellidos, :username, :password,  :avatar, :email,:tipo, :activo)') ;
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'username' => $username,
            'avatar' => $avatar,
            'email' => $email,
            'password' => $password,
            'tipo' => $tipo,
            'activo' => $activo,


        )
    );

    $_SESSION["mensajes"] = "Registro añadido correctamente.";

   // Redireccionamos a Leer
   header('Location: index.php');

} 
 
 // Obtiene un resultado
 
 try {
     echo $blade->run("usuarios.nuevo"
         );
 } catch (Exception $e) {
 }
 