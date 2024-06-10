<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Muestra todas las categorias
   */
  public function index()
  {
    $categories = Category::all();
    return view('category.index', compact('categories'));
  }

  /**
   * Muestra el formulario para crear una nueva categoria.
   */
  public function create()
  {
    return view('category.create');
  }

  /**
   * Muestra un formulario para editar una categoria y busca la categoria.
   */
  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('category.edit', compact('category'));
  }

  /**
   * Muestra una categoria.
   */
  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('category.show', compact('category'));
  }

  /**
   * Guarda una categoria en la BD.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameCategory' => 'required',
    ], [
      'nameCategory.required' => 'El nombre de categoría es obligatorio.',
    ]);
    Category::create($request->all());
    return redirect()->route('category.index')
      ->with('success', 'Categoria creada con éxito.');
  }

  /**
   * Edita los datos de una categoria.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nameCategory' => 'required|max:100',
    ], [
      'nameCategory.required' => 'El nombre de categoría es obligatorio.',
    ]);
    $category = Category::find($id);
    $category->update($request->all());
    return redirect()->route('category.index')->with('success', 'Categoria actualizada con éxito.');
  }

  /**
   * Hace un borrado logico.
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    $category->habilitated = 0;
    $category->save();
    return redirect()->route('category.index')->with('success', 'Categoria eliminada con éxito.');
  }

  /**
   * Hace una alta logica.
   */
  public function alta($id)
  {
    $category = Category::find($id);
    $category->habilitated = 1;
    $category->save();
    return redirect()->route('category.index')->with('success', 'Categoria eliminada con éxito.');
  }

  /**
   * Devuelve todas las categorias habilitadas.
   */
  public function devolverCategorias()
  {
    $categories = Category::where('habilitated', 1)->get();
    return $categories;
  }
}
