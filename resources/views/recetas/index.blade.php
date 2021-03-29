@extends('layouts.app')

@section('botones')

    <a href="{{ route("recetas.create") }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>

@endsection

@section('content')

    <h2 class="text-center mb-5">Administra tus Recetas</h2>

    

    <div class="col-md-10 mx-auto bg-white p-3">

        <table class="table">

            <thead class="bg-primary text-light">

                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoría</th>
                    <th scole="col">Acciones</th>
                </tr>

            </thead>

            <tbody>
                @foreach ($recetas as $receta)
                <tr>

                    <td>
                        {{ $receta->titulo_receta }}
                    </td>
                    
                    <td>
                        {{ $receta->categoria->nombre }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-md"> Eliminar </a>
                        <a href="#" class="btn btn-dark btn-md"> Editar </a>
                        <a href="#" class="btn btn-success btn-md"> Ver </a>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection
