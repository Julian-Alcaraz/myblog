<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
   * Muestra SOLO los post habilitados = 1
   * 
   * CONSIGNA:
   * | Modificar el método "index" para que obtenga toda la lista de posts desde la base de datos
   * | usando el modelo Post y que se la pase a la vista
   */
  public function index()
  {
    // $colPosts = Post::all();
    $colPosts = Post::where('habilitated', 1)->get();
    return view('post.index', compact('colPosts'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $colCategories = Category::all();
    return view('post.create', compact('colCategories'));
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
    $post = Post::findOrFail($post->idPost);
    return view('post.edit', compact('post'));
  }

  /**
   * Muestra todos los post que estan habilitados.
   * 
   * CONSIGNA:
   * | Modificar el método "show" para que obtenga el post pasado
   * | por parámetro usando el método findOrFail y se la pase a la vista.
   */
  public function show(Post $post)
  {
    $post = Post::findOrFail($post->idPost);
    return view('post.show', compact('post'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'titlePost' => 'required|max:100',
      'contentPost' => 'required',
      'poster' => 'required',
    ]);
    Post::create($request->all());
    return redirect()->route('post.index')
      ->with('success', 'Post created successfully.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    // De esta forma tiene que cambiar todo lo del post, no puede cambiar solo titulo ni solo contenido
    $request->validate([
      'titlePost' => 'required|max:100',
      'contentPost' => 'required',
    ]);
    $post = Post::find($post->idPost);
    $post->update($request->all());
    return redirect()->route('post.index')
      ->with('success', 'Post actualizado con éxito.');
  }

  /**
   * Hace un borrado logico
   */
  public function destroy(Post $post)
  {
    $post->habilitated = false;
    $post->save();

    return redirect()->route('post.index')
      ->with('success', 'Post disabled successfully');
  }

  /**
   * Borra
   */
  public function destroy2(Post $post)
  {
    $post->delete();
    return redirect()->route('post.index')
      ->with('success', 'Post deleted successfully');
  }

  /**
   * No se si esta bien esto aca FEO
   */
  public function returnUser($id)
  {
    // Encuentra el post por su ID
    $post = Post::find($id);
    // Accede al usuario que creó el post
    $user = $post->user;
    // Accede al nombre del usuario
    $userName = $user->name; // Asumiendo que el modelo User tiene un campo 'name
    return view('post.index', compact('post', 'userName'));
  }
}
