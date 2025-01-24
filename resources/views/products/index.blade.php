{{-- 9. Hacemos la vista de la tabla products --}}
@extends('layouts.plantilla')

@section('cabecera')
Tabla de productos
@endsection

@section('titulo')
Listado de productos
@endsection

@section('contenido')
<a href="{{route('products.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-96">
    <i class="fa-solid fa-plus mr-2"></i>Insertar
</a>
<table class="w-1/2 mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Imagen
            </th>
            <th scope="col" class="px-6 py-3">
                Nombre
            </th>
            <th scope="col" class="px-6 py-3">
                Descripción
            </th>
            <th scope="col" class="px-6 py-3">
                Categoría
            </th>
            <th scope="col" class="px-6 py-3">
                Stock
            </th>
            <th scope="col" class="px-6 py-3">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <img src="{{Storage::url($item -> imagen)}}" alt="Image Description" class="w-20 h-20 rounded-lg">
                </div>
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$item -> nombre}}
            </td>
            <td class="px-6 py-4">
                <a href="{{route('products.show',$item)}}">
                    <i class="fa-solid fa-comment text-blue-500 text-3xl ml-4"></i>
                </a>
            </td>
            <td class="px-6 py-4">
                <div class="p-2 text-center font-bold text-white bg-[{{$item -> category -> color}}] rounded-xl  ">
                    {{$item -> category -> nombre}}
                </div>
            </td>
            <td class="px-6 py-4">
                {{$item -> stock}}
            </td>
            <td class="px-6 py-4">
                <form action="{{route('products.destroy',$item)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fa-solid fa-delete-left text-red-400 mr-2 text-lg"></i>
                    </button>
                    <a href="{{route('products.edit',$item)}}">
                        <i class="fa-solid fa-pen-to-square text-green-400 text-lg"></i>
                    </a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-1/2 mx-auto mt-2">
    {{$products -> links()}}
</div>
@endsection
@section('alertas')
<x-alertas for="mensaje"/>
@endsection