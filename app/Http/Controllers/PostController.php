<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  /**
   * Muestra SOLO los post habilitados y filtra segun categorias.
   */
  public function index(Request $request)
  {
    /*
    $objCategory = new CategoryController();
    $colPosts = Post::where('habilitated', 1)->get();
    $colCategories = $objCategory->devolverCategorias();
    return view('post.index', compact('colPosts', 'colCategories'));
    */
    $objCategory = new CategoryController();
    $query = Post::where('habilitated', 1);
    if ($request->has('idCategory') && $request->idCategory != '') {
      $query->where('idCategory', $request->idCategory);
    }
    $colPosts = $query->get();
    $colCategories = $objCategory->devolverCategorias();
    return view('post.index', compact('colPosts', 'colCategories'));
  }

  /**
   * Muestra el formulario para crear un nuevo post
   */
  public function create()
  {
    $objCategory = new CategoryController();
    $colCategories = $objCategory->devolverCategorias();
    return view('post.create', compact('colCategories'));
  }

  /**
   * Muestra un formulario para editar un post y busca el Post
   */
  public function edit(Post $post)
  {
    $post = Post::findOrFail($post->idPost);
    return view('post.edit', compact('post'));
  }

  /**
   * Muestra un post.
   */
  public function show(Post $post)
  {
    $post = Post::findOrFail($post->idPost);
    return view('post.show', compact('post'));
  }

  /**
   * Guarda un post en la BD.
   */
  public function store(Request $request)
  {
    // Verificaciones
    $request->validate([
      'titlePost' => 'required|max:100',
      'contentPost' => 'required',
      'idCategory' => 'required|exists:categories,idCategory',
    ], [
      'titlePost.required' => 'El título es obligatorio.',
      'titlePost.max' => 'El título no puede tener mas de 100 caracteres.',
      'contentPost.required' => 'El contenido es obligatorio.',
      'idCategory.required' => 'La categoría es obligatoria.',
      'idCategory.exists' => 'La categoría seleccionada no es válida.',
    ]);
    $post = new Post();
    $post->titlePost = $request->titlePost;
    $post->contentPost = $request->contentPost;
    $post->idCategory = $request->idCategory;
    $post->idUserPoster = Auth::id();
    $post->save();
    return redirect()->route('post.index')->with('success', 'Post creado con éxito.');
  }

  /**
   * Edita los datos de un post.
   */
  public function update(Request $request, Post $post)
  {
    // Validaciones
    $request->validate([
      'titlePost' => 'required|max:100',
      'contentPost' => 'required',
    ], [
      'titlePost.required' => 'El título es obligatorio.',
      'titlePost.max' => 'El título no puede tener mas de 100 caracteres.',
      'contentPost.required' => 'El contenido es obligatorio.',
    ]);
    $post = Post::find($post->idPost);
    $post->update($request->only(['titlePost', 'contentPost']));
    return redirect()->route('post.index')->with('success', 'Post actualizado con éxito.');
  }

  /**
   * Hace un borrado logico
   */
  public function destroy(Post $post)
  {
    $post->habilitated = false;
    $post->save();
    return redirect()->route('post.index')->with('success', 'Post borrado con éxito');
  }

  /**
   * Verifica si el usuario es dueño del post
   */
  public function esUserDuenioPost($userId, $idUserPoster)
  {
    $esDuenio = true;
    if ($userId !== $idUserPoster) {
      $esDuenio = false;
    }
    return $esDuenio;
  }
}
