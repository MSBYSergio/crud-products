<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 10.- Devolvemos la vista de index
        $products = Product::with('category')->orderBy('id')->paginate(5); // Para solucionar el problema n + 1
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::orderBy('id')->get();
        return view('products.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 12.- Hacemos el método store
        $datos = $request->validate($this->rules());
        // Aquí los datos son validos ...
        if ($request->imagen) { // Mucho cuidado con los nombres del formulario
            $datos['imagen'] = $request->imagen->store('imagenes/');
        } else {
            $datos['imagen'] = "imagenes/default.jpg";
        }
        Product::create($datos);
        return redirect()->route('products.index')->with('mensaje', "Producto insertado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorias = Category::orderBy('id')->get();
        return view('products.edit', compact('product', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $imagen = $product -> imagen; // Guardo en una variable la imagen antigua
        $datos = $request->validate($this->rules($product->id));
        if ($request->imagen) { // Si se ha subido una imagen la almaceno 
            $datos['imagen'] = $request->imagen->store('imagenes/');
            if (basename($imagen) != "default.jpg") { // Si la antigua es distinta a la default
                Storage::delete($imagen); // La elimino
            }
        } else {
            $datos['imagen'] = $request->imagen; // Si no ha subido ninguna le pongo lo que tenía antes
        }
        $product->update($datos);
        return redirect()->route('products.index')->with('mensaje', "Producto editado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (basename($product->imagen) != "default.jpg") {
            Storage::delete($product->imagen);
        }
        $product -> delete();
        return redirect()->route('products.index')->with('mensaje', "Producto eliminado correctamente.");
    }

    private function rules(?int $id = null)
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:50', 'unique:products,nombre,' . $id],
            'descripcion' => ['required', 'min:10', 'max:100'],
            'stock' => ['required', 'integer', 'min:1'],
            'imagen' => ['image', 'max:2046'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
