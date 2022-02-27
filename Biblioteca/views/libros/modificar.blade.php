<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar libro</title>
</head>
<body>
<form method="post">
    <p>
        <label for="titulo">Titulo: </label>
        <input id="titulo" type="text" name="titulo" value="{{$libros['titulo']}}">
    </p>
    <p>
        <label for="autor">Autor: </label>
        <input id="autor" type="text" name="autor" value="{{$libros['autor']}}">

    </p>
    <p>
    <div>¿Disponible?</div>

    <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
    </p>

    <p>
        <input type="hidden" name="id" value="{{ $libros['id']}} ">
        <input type="submit" value="Modificar">
    </p>
</form>
</body>
</html>