@extends('plantilla')

@section('content')
    @foreach ($entradas as $e)
        <div>
            <h2>{{ $e["titulo"] }}</h2>
            <div style="display: flex">
                <img src="https://picsum.photos/100/60" alt="">
                <p>{{ $e["entrada"] }}</p>
            </div>
        </div>
    @endforeach
@endsection

@section('comentarios')
    <h2>Comentarios</h2>
    @foreach ($comentarios as $e)
        <div>
            {{ $e["comentario"] }}
        </div>
    @endforeach
@endsection

@section('etiquetas')
    <h2>Etiquetas</h2>
    @foreach ($entradas as $e)
        {{ $e["etiquetas"] }}
    @endforeach
@endsection
