<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar categoría</title>
</head>
<body>
<form action="" method="post">
    <p>
        <label for="nombre">Categoría: </label>
        <input id="nombre" type="text" name="nombre" value="{{$categorias['nombre']}}">
    </p>


    <p>
        <input type="hidden" name="id" value="{{ $categorias['id']}} ">
        <input type="submit" value="Modificar">
    </p>
</form>
</body>
</html>