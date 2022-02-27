<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar editorial</title>
</head>
<body>
<form action="" method="post">
    <p>
        <label for="nombre">Nombre: </label>
        <input id="nombre" type="text" name="nombre" value="{{$editorial['nombre']}}">
    </p>


    <p>
        <input type="hidden" name="id" value="{{ $editorial['id']}} ">
        <input type="submit" value="Modificar">
    </p>
</form>
</body>
</html>