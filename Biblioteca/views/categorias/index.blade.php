@extends('plantilla')

@section('content')
    <h1>Categorias</h1>
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
            <th>Fecha de creación</th>
            <th>Fecha de modificación</th>


            <th colspan="2">Opciones</th>
        </tr>

        @foreach ($categorias as $clave => $valor)
            <tr>
                <td>{{ $valor['id'] }}</td>
                <td>{{ $valor['nombre'] }}</td>
                <td>{{ $valor['fecha_creacion'] }}</td>
                <td>{{ $valor['fecha_modificacion'] }}</td>


                <td><a class="btn btn-primary btn-sm" href="modificar.php?id={{ $valor['id'] }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>

                <td>
                    <a class="btn btn-danger btn-sm" onClick="return confirm('¿ Desea borrar la categoría ?')" href="borrar.php?id={{ $valor['id'] }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    Total: {{ count($categorias) }}
@endsection
