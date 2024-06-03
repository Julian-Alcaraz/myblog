<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::all();
    return view('role.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('role.create');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $role = Role::findOrFail($id);
    return view('role.edit', compact('role'));
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $role = Role::findOrFail($id);
    return view('role.show', compact('role'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameRole' => 'required|max:20',
    ]);
    Role::create($request->all());
    return redirect()->route('role.index')
      ->with('success', 'Rol creado con éxito.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nameRole' => 'required|max:20',
    ]);
    $role = Role::find($id);
    $role->update($request->all());
    return redirect()->route('role.index')
      ->with('success', 'Rol actualizado con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $role = Role::find($id);
    $role->delete();
    return redirect()->route('role.index')
      ->with('success', 'Rol eliminado con éxito.');
  }
}
