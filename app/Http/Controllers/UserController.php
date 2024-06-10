<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Muestra TODOS los usuarios.
   */
  public function index()
  {
    $usuarios = User::all();
    return (view('user.index', compact('usuarios')));
  }

  /**
   * Muestra el formulario para crear un nuevo usuario.
   */
  public function create()
  {
    return view('user.create');
  }

  /**
   * Guarda un usuario en la BD.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Muestra un usuario.
   */
  public function show(User $user)
  {
    $user = user::findOrFail($user->id);
    return view('user.show', compact('user'));
  }

  /**
   * Muestra un formulario para editar un usuario y busca el usuario.
   * Además busca todos los roles para mostrarlos como opción.
   */
  public function edit(User $user)
  {
    $objRoleController = new RoleController();
    $roles = $objRoleController->devolverRoles();
    $user = User::findOrFail($user->id);
    return view('user.edit', compact('user', 'roles'));
  }

  /**
   * Edita los datos de un usuario.
   */
  public function update(Request $request, User $user)
  {
    $request->validate([
      'name' => 'required|max:100',
      'email' => 'required|max:100',
      'role' => 'required',
    ], [
      'name.required' => 'El nombre del usuario es obligatorio.',
      'name.max' => 'El nombre del usuario no puede tener más de 100 carácteres.',
      'email.required' => 'El email es obligatorio.',
      'email.max' => 'El email no puede tener más de 100 carácteres.',
      'role.required' => 'El rol es obligatorio.',
    ]);
    $user = User::find($user->id);
    $user->update($request->all());
    return redirect()->route('user.index')
      ->with('success', 'Usuario actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->habilitated = 0;
    $user->save();
    return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente');
  }

  /**
   * Hace una alta logica.
   */
  public function alta($id)
  {
    $user = User::find($id);
    $user->habilitated = 1;
    $user->save();
    return redirect()->route('user.index')->with('success', 'Usuario habilitado exitosamente');
  }
}
