@extends('layouts.plantilla')
@section('cabecera')
Insertar
@endsection
@section('contenido')
<div class="bg-white p-8 rounded-lg shadow-lg w-1/2 mx-auto mt-24">
    <h2 class="text-2xl font-bold mb-6 text-gray-700 text-center">Insertar Categoría</h2>
    <form action="{{route('categories.store')}}" method="POST" class="space-y-4">
        @csrf
        <!-- Nombre -->
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
            <input type="text" id="name" name="nombre" value="{{@old('nombre')}}"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                placeholder="Escribe el nombre...">
            <x-error for="nombre" />
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-sm font-medium text-gray-700">Elige un Color</label>
            <input type="color" id="color" name="color" value="{{@old('color')}}"
                class="w-full h-10 mt-1 border border-gray-300 rounded-lg cursor-pointer">
            <x-error for="color" />
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-6">
            <!-- Botón Insertar -->
            <button type="submit" class="flex items-center bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg focus:ring-4 focus:ring-green-300">
                <i class="fas fa-check mr-2"></i> Insertar
            </button>
            <!-- Botón Resetear -->
            <button type="reset" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-lg focus:ring-4 focus:ring-yellow-300">
                <i class="fas fa-redo mr-2"></i> Reset
            </button>
            <!-- Botón Salir -->
            <a href="{{route('categories.index')}}"
                class="flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg focus:ring-4 focus:ring-red-300">
                <i class="fas fa-times mr-2"></i> Salir
            </a>
        </div>
    </form>
</div>
@endsection