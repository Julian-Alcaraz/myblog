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
    $categories = Category::all();
    return view('category.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('category.create');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('category.edit', compact('category'));
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('category.show', compact('category'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameCategory' => 'required',
    ]);
    Category::create($request->all());
    return redirect()->route('category.index')
      ->with('success', 'Categoria creada con éxito.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nameCategory' => 'required|max:100',
    ]);
    $category = Category::find($id);
    $category->update($request->all());
    return redirect()->route('category.index')
      ->with('success', 'Categoria actualizada con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    // $category->delete();
    $category->habilitated = 0;
    $category->save();
    // $category->update($request->all());
    return redirect()->route('category.index')
      ->with('success', 'Categoria eliminada con éxito.');
  }
  public function alta($id)
  {
    $category = Category::find($id);
    $category->habilitated = 1;
    $category->save();
    return redirect()->route('category.index')
      ->with('success', 'Categoria eliminada con éxito.');
  }

    /**
   * Devuelve todas las categorias habilitadas
   */
  public function devolverCategorias()
  {
    $categories = Category::where('habilitated', 1)->get();
    return $categories;
  }
}
