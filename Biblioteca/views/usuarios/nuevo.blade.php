<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear libro</title>
</head>
<body>
<form method="post">
    <p>
        <label for="nombre">Nombre: </label>
        <input id="nombre" type="text" name="nombre">
    </p>
    <p>
        <label for="apellidos">Apellidos: </label>
        <input id="apellidos" type="text" name="apellidos">

    </p>
    <p>
        <label for="username">Usuario: </label>
        <input id="username" type="text" name="username">

    </p>

    <p>
        <label for="password">Contraseña: </label>
        <input id="password" type="password" name="password">

    </p>

    <p>
        <label for="avatar">Avatar: </label>
        <input id="avatar" type="file" name="avatar">

    </p>

    <p>
        <label for="email">E-mail: </label>
        <input id="email" type="email" name="email">

    </p>
    <p>Tipo de usuario:
        <select name="tipo" class="form-control">
            <option value=""> Seleccione el tipo de usuario... </option>
            <option value="bibliotecario"> Bibliotecario </option>
            <option value="alumno"> Alumno </option>


        </select>

    </p>

    <p>
    <div>¿Activo?</div>

    <input id="si-activo" type="radio" name="activo" value="1" checked> <label for="si-activo">Si</label>
    <input id="no-activo" type="radio" name="activo" value="0"> <label for="no-activo">No</label>
    </p>
    <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
    <a class="btn btn-secondary btn-sm" href="index.php">Cancelar</a>
    </p>
</form>
</body>
</html>
