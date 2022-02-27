@extends('.plantilla')

@section("content")
    <h1>Crear categorias</h1>

    <form action="" method="post">
        <p>
            <label for="autor">Nombre</label>
            <input class="form-control" id="autor" type="text" name="autor">
        </p>
        <p>
            <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
            <a class="btn btn-secondary btn-sm" href="../../admin/categorias/index.php">Cancelar</a>
        </p>
    </form>
@endsection