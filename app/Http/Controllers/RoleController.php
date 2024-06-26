<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  /**
   * Muestra TODOS los roles.
   */
  public function index()
  {
    $roles = Role::all();
    return view('role.index', compact('roles'));
  }

  /**
   * Muestra el formulario para crear un nuevo rol.
   */
  public function create()
  {
    return view('role.create');
  }

  /**
   * Muestra un formulario para editar un rol.
   */
  public function edit($id)
  {
    $role = Role::findOrFail($id);
    return view('role.edit', compact('role'));
  }

  /**
   * Muestra un rol.
   */
  public function show($id)
  {
    $role = Role::findOrFail($id);
    return view('role.show', compact('role'));
  }

  /**
   * Guarda un rol en la BD.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameRole' => 'required|max:20',
    ], [
      'nameRole.required' => 'El nombre del rol es obligatorio.',
      'nameRole.max' => 'El nombre del rol no puede tener mas de 20 carácteres.',
    ]);
    Role::create($request->all());
    return redirect()->route('role.index')->with('success', 'Rol creado con éxito.');
  }

  /**
   * Actualiza un rol en la BD.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nameRole' => 'required|max:20',
    ], [
      'nameRole.required' => 'El nombre del rol es obligatorio.',
      'nameRole.max' => 'El nombre del rol no puede tener mas de 20 carácteres.',
    ]);
    $role = Role::find($id);
    $role->update($request->all());
    return redirect()->route('role.index')->with('success', 'Rol actualizado con éxito.');
  }

  /**
   * Borra un rol de la BD.
   */
  public function destroy($id)
  {
    $role = Role::find($id);
    $role->habilitated = 0;
    $role->save();
    return redirect()->route('role.index')->with('success', 'Rol eliminado con éxito.');
  }

  /**
   * Hace alta de rol.
   */
  public function alta($id)
  {
    $role = Role::find($id);
    $role->habilitated = 1;
    $role->save();
    return redirect()->route('role.index')->with('success', 'Rol habilitado con éxito.');
  }

  /**
   * Devuelve el obj rol segun un id.
   */
  public function devolverObjRol($idRole)
  {
    $rol = Role::find($idRole);
    return $rol;
  }

  /**
   * Devuelve todos los roles
   */
  public function devolverRoles()
  {
    $roles = Role::all();
    return $roles;
  }
}
