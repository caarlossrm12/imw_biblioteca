@extends('plantilla')

@section('content')
    <h1>Usuarios</h1>
    <p><a href="../../admin/index.php">VOLVER AL PANEL DE ADMINISTRACIÓN</a></p>

    <div class="d-flex justify-content-between mb-2">
        <form action="index.php" method="post">
            <div class="input-group">
                <label for="name">Buscar</label><input class="form-control" type="text" id="name" name="buscar">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>

        <a class="btn btn-success btn-sm" href="nuevo.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>
    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Nombre de usuario</th>
            <th>Avatar</th>

            <th>E-mail</th>
            <th>Tipo</th>
            <th>Activo</th>

            <th>Fecha de creación</th>
            <th>Fecha de modificación</th>


            <th colspan="2">Opciones</th>
        </tr>

        @foreach ($usuarios as $clave => $valor)
            <tr>
                <td>{{ $valor['id'] }}</td>
                <td>{{ $valor['nombre'] }}</td>
                <td>{{ $valor['apellidos'] }}</td>
                <td>{{ $valor['username'] }}</td>
                <td><img class="w-25 h-25" src="../../imagenes/usuarios/{{ $valor["avatar"] }}" alt=""></td>
                <td>{{ $valor['email'] }}</td>
                <td>{{ $valor['tipo'] }}</td>
                <td><i class='fa fa-circle {{ $valor['activo'] ? 'text-success': 'text-danger' }}'></i></td>
                <td>{{ $valor['fecha_creacion'] }}</td>
                <td>{{ $valor['fecha_modificacion'] }}</td>


                <td><a class="btn btn-primary btn-sm" href="modificar.php?id={{ $valor['id'] }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>

                <td>
                    <a class="btn btn-danger btn-sm" onClick="return confirm('¿ Desea borrar el usuario ?')" href="borrar.php?id={{ $valor['id'] }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    Total: {{ count($usuarios) }}
@endsection
