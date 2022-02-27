<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar sanción</title>
</head>
<body>
<form action="" method="post">
    <p>
        <label for="id">id: </label>
        <input id="id" type="text" name="id" value="{{$sanciones['id']}}">
    </p>

    <p>
        <label for="motivo">Motivo: </label>
        <input id="motivo" type="text" name="motivo" value="{{$sanciones['motivo']}}">
    </p>
    <p>
        <input type="hidden" name="id" value="{{ $sanciones['id']}} ">
        <input type="submit" value="Modificar">
    </p>
</form>
</body>
</html>