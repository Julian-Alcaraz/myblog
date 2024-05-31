<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   * 
   * CONSIGNA:
   * | Modificar el método "index" para que obtenga toda la lista de posts desde la base de datos
   * | usando el modelo Post y que se la pase a la vista
   */
  public function index()
  {
    $posts = Post::query()->paginate();
    return view('category.index', ['posts' => $posts]);
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
   * 
   * CONSIGNA: 
   * | Modificar el método "edit" para que obtenga el post pasado por parámetro usando el
   * | método findOrFail y se la pase a la vista.
   */
  public function edit(Post $post)
  {
    //return "category edit";
    return view('category.edit', ['post' => $post]);
  }

  /**
   * Display the specified resource.
   * 
   * CONSIGNA:
   * | Modificar el método "show" para que obtenga el post pasado
   * | por parámetro usando el método findOrFail y se la pase a la vista.
   */
  public function show(Post $post)
  {
    return view('category.show', ['post' => $post]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }
  
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    //
  }
}
