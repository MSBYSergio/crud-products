{{-- 11. Hacemos la vista del create --}}
@extends('layouts.plantilla')
@section('cabecera')
Insertar
@endsection
@section('contenido')
<div class="w-full mx-auto mt-20 max-w-lg bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-box-open text-blue-500 mr-3"></i> Agregar Producto
    </h1>
    <form action="{{route('products.store')}}" method="post" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <!-- Nombre del producto -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="product-name">
                <i class="fas fa-tag text-blue-500"></i> Nombre del Producto
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old('nombre')}}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Escribe el nombre del producto">
            <x-error for="nombre" />

        </div>

        <!-- Descripción -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">
                <i class="fas fa-align-left text-blue-500"></i> Descripción
            </label>
            <textarea
                id="descripcion"
                name="descripcion"
                rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Describe el producto">{{@old('descripcion')}}</textarea>
            <x-error for="descripcion" />

        </div>

        <!-- Stock -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="stock">
                <i class="fas fa-layer-group text-blue-500"></i> Stock
            </label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{@old('stock')}}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Cantidad disponible">
            <x-error for="stock" />
        </div>

        <!-- Categoría -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="category">
                <i class="fas fa-list text-blue-500"></i> Categoría
            </label>
            <select
                id="category_id"
                name="category_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Selecciona una categoría</option>
                @foreach ($categorias as $item)
                <option value="{{$item -> id}}" @selected(@old('category_id') == $item -> id)>{{$item -> nombre}}</option>
                @endforeach
            </select>
            <x-error for="category_id" />
        </div>

        <!-- Imagen del producto -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="image">
                <i class="fas fa-image text-blue-500"></i> Imagen del Producto
            </label>
            <div class="mb-4">
                <div class="mt-2">
                    <img id="preview" name="imagen" src="{{Storage::url('imagenes/default.jpg')}}" class="h-32 w-32 rounded-xl border border-gray-300 object-cover" alt="">
                    <input type="file" id="imagen" name="imagen" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" oninput="preview.src=window.URL.createObjectURL(this.files[0])">
                </div>
            </div>
            <x-error for="imagen" />
        </div>

        <!-- Botones -->
        <div class="flex justify-between items-center space-x-2">
            <!-- Botón de enviar -->
            <button
                type="submit"
                class="flex-1 bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
            <!-- Botón de reset -->
            <button
                type="reset"
                class="flex-1 bg-gray-400 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                <i class="fas fa-undo"></i> Resetear
            </button>
            <!-- Botón de salir -->
            <button
                type="button"
                class="flex-1 bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                <i class="fas fa-times"></i> Salir
            </button>
        </div>
    </form>
</div>
@endsection