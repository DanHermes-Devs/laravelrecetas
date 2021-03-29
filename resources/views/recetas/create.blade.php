@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"/>

@endsection

@section('botones')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>

@endsection

@section('content')

    <h2 class="text-center mb-5">Crear nueva receta</h2>

    <div class="row justify-content-center mt-5">

        <div class="col-md-8">

            <form action="{{ route('recetas.store') }}" method="post" novalidate enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="titulo">Título Receta</label>

                    <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror"
                        placeholder="Título Receta" required autocomplete="titulo" autofocus
                        value="{{ old('titulo') }}" />

                    @error('titulo')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror
                </div>

                <div class="form-group">

                    <label for="titulo">Categoria</label>

                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria"
                        required autocomplete="categoria" autofocus>
                        <option value="">-- Seleccionar Categoría --</option>

                        @foreach ($categorias as $categoria)

                            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>

                        @endforeach

                    </select>

                    @error('categoria')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror
                </div>

                <div class="form-group">

                    <label for="preparacion">Preparación</label>

                    <input type="hidden" name="preparacion" class="form-control" id="preparacion"
                        value="{{ old('preparacion') }}" required autocomplete="preparacion" autofocus>

                    <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror">
                    </trix-editor>

                    @error('preparacion')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="ingredientes">Ingredientes</label>

                    <input type="hidden" name="ingredientes" class="form-control" id="ingredientes"
                        value="{{ old('ingredientes') }}" required autocomplete="ingredientes" autofocus>

                    <trix-editor input="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>

                    @error('ingredientes')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="imagen">Imagen</label>

                    <input type="file" name="imagen" class="form-control @error('ingredientes') is-invalid @enderror" id="imagen"
                        value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>

                    @error('imagen')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    <input type="submit" id="agregarReceta" class="btn btn-primary" value="Agregar Receta">

                </div>

            </form>

        </div>

    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous"></script>

@endsection


