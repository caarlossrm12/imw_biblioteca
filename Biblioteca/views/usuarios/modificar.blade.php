<?php
?>
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar usuario</title>
</head>
<body>
<form method="post">
    <p>
        <label for="nombre">Nombre: </label>
        <input id="nombre" type="text" name="nombre" value="{{$usuarios['nombre']}}">
    </p>
    <p>
        <label for="nombre">Apellidos: </label>
        <input id="apellidos" type="text" name="apellidos" value="{{$usuarios['apellidos']}}">
    </p>
    <p>
        <label for="username">Usuario: </label>
        <input id="username" type="text" name="username" value="{{$usuarios['username']}}">
    </p>
    <p>
        <label for="password">Contraseña: </label>
        <input id="password" type="password" name="password" value="{{$usuarios['password']}}">
    </p>
    <p>
        <label for="avatar">Avatar: </label>
        <input id="avatar" type="file" name="avatar" value="{{$usuarios['avatar']}}">
    </p>

    <p>
        <label for="email">Email: </label>
        <input id="email" type="email" name="email" value="{{$usuarios['email']}}">
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

    <p>
        <input type="hidden" name="id" value="{{ $usuarios['id']}} ">
        <input type="submit" value="Modificar">
    </p>
</form>
</body>
</html>
