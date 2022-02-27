<?php
session_start();

include "../BaseDeDatos.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $usuario_id = isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : null;

    $motivo = isset($_REQUEST['motivo']) ? $_REQUEST['motivo'] : null;


    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO sanciones (id, usuario_id, motivo) VALUES (:id, :usuario_id, :motivo)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'id' => $id,
            'usuario_id' => $usuario_id,

            'motivo' => $motivo,


        )
    );

    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    // Redireccionamos a Leer
    header('Location: index.php');
}

?>



<h1>Añadir préstamo</h1>

<form action="" method="post">
    <p>
        <label for="titulo">Nombre</label>
        <input class="form-control" id="id" type="text" name="id">
    </p>
    <p>
        <label for="titulo">ID USUARIO</label>
        <input class="form-control" id="usuario_id" type="text" name="usuario_id">
    </p>

    <p>
        <label for="titulo">Motivo</label>
        <input class="form-control" id="motivo" type="text" name="motivo">
    </p>
        <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
        <a class="btn btn-secondary btn-sm" href="index.php">Cancelar</a>
    </p>
</form>


