<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear libro</title>
</head>
<body>
<form method="post">
    <p>
        <label for="titulo">Titulo: </label>
        <input id="titulo" type="text" name="titulo">
    </p>
    <p>
        <label for="autor">Autor: </label>
        <input id="autor" type="text" name="autor">

    </p>
    <p>
    <div>¿Disponible?</div>

    <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
    </p>

    <p>
        <input type="hidden" name="id">
        <input type="submit" value="Crear">
    </p>
</form>
</body>
</html>