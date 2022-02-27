<?php
session_start();

include "../BaseDeDatos.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;


    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO prestamos (id) VALUES (:id)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'id' => $id,

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

        <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
        <a class="btn btn-secondary btn-sm" href="index.php">Cancelar</a>
    </p>
</form>


