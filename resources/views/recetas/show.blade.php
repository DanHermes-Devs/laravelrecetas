@extends('layouts.app')


@section('content')

    <article class="contenido-receta">
        
        <h1 class="text-center mb-4">
            {{ $receta->titulo_receta }}
        </h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" class="img-fluid">
        </div>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{ $receta->categoria->nombre }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{-- TODO: Mostrar el usuario --}}
                {{ $receta->user_id }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha de Publicación:</span>
                {{ $receta->created_at }}
            </p>

        </div>

        <div class="ingredientes">

            <h2 class="my-3 text-primary">Ingredinetes</h2>
            {{-- Para imprimir codigo html que se haya incrustado en la BD, la imprimirmos de la manera siguiente: con !! aqui en medio va lo que deseas imprimir !! --}}
            {!! $receta->ingredientes !!}

        </div>

        <div class="preparacion">

            <h2 class="my-3 text-primary">Preparación</h2>

            {!! $receta->preparacion !!}

        </div>

    </article>

@endsection
