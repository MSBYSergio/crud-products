@extends('layouts.plantilla')
@section('cabecera')
Descripción
@endsection
@section('titulo')
Descripción del producto
@endsection
@section('contenido')
<div class="w-full mx-auto mt-20 max-w-lg bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fa-solid fa-envelope-open-text text-blue-500 mr-2"></i> Mostrar descripción
    </h1>
    <form action="{{route('products.index')}}" method="get" class="space-y-4">
        @csrf
        <!-- Descripción -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">
                <i class="fas fa-align-left text-blue-500"></i> Descripción
            </label>
            <textarea
                id="descripcion"
                name="descripcion"
                rows="6"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Describe el producto">{{$product -> descripcion}}</textarea>
        </div>

        <!-- Boton -->
        <div class="flex justify-between items-center space-x-2">
            <!-- Botón de salir -->
            <button
                type="submit"
                class="flex-1 bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                <i class="fas fa-times"></i> Salir
            </button>
        </div>
    </form>
</div>
@endsection