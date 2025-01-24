<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 3. Una vez que tenemos la vista tenemos que devolverla con todas las categorías

        $categorias = Category::orderBy('id')->get();
        return view('categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 5.- Validamos e intentamos insertar todos los datos
        
        $request -> validate($this -> rules());
        Category::create($request -> all());
        return redirect() -> route('categories.index') -> with('mensaje','Categoría insertada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 7.- Actualizamos todos los datos
        $request -> validate($this -> rules($category -> id));
        $category -> update($request -> all());
        return redirect() -> route('categories.index') -> with('mensaje',"Categoría editada correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // 8.- Eliminamos la categoría
        $category -> delete();
        return redirect() -> route('categories.index') -> with('mensaje',"Categoría eliminada correctamente.");
    }

    private function rules(?int $id = null) {
        // unique:tabla,campo
        return [
            'nombre' => ['required','min:5','max:15','unique:categories,nombre,' .$id],
            'color' => ['required','color_hex'],
        ];
    }
}
