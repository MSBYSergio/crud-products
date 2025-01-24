@extends('layouts.plantilla')

@section('cabecera')
Tabla de categorías
@endsection

@section('titulo')
Listado de categorías
@endsection

@section('contenido')
<div class="w-1/2 flex justify-center ml-20">
    <a href="{{route('categories.create')}}"
        class="text-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 
    font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 
    dark:focus:ring-green-800"><i class="fa-solid fa-plus mr-2"></i>INSERTAR</a>
</div>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table
                    class="w-1/2 mx-auto mt-6 text-left text-sm font-light text-surface dark:text-white">
                    <thead
                        class="border-b border-neutral-200 font-medium dark:border-white/10">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nombre</th>
                            <th scope="col" class="px-6 py-4">Color</th>
                            <th scope="col" class="px-6 py-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $item)
                        <tr
                            class="border-b border-neutral-200 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-white/10 dark:hover:bg-neutral-600">
                            <td class="whitespace-nowrap px-6 py-4 font-medium text-lg">{{$item -> nombre}}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-white text-lg font-bold">
                                <div class="p-2 rounded-md bg-[{{$item -> color}}]">
                                    {{$item -> color}}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-lg font-bold">
                                <form action="{{route('categories.destroy',$item)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="fa-solid fa-delete-left text-red-400 mr-2"></i>
                                    </button>
                                    <a href="{{route('categories.edit',$item)}}">
                                        <i class="fa-solid fa-pen-to-square text-green-400"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('alertas')
<x-alertas for="mensaje"/>
@endsection