<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuRoleController;
use App\Http\Controllers\RoleController;

class MenuController extends Controller
{
  /**
   * Muestra TODOS los menus.
   */
  public function index()
  {
    $menus = Menu::all();
    return view('menu.index', compact('menus'));
  }

  /**
   * Muestra el formulario para crear un nuevo menu.
   */
  public function create()
  {
    $menus = Menu::all();
    $objRoleController = new RoleController();
    $colRoles = $objRoleController->devolverRoles();
    return view('menu.create', compact('menus'), compact('colRoles'));
  }

  /**
   * Muestra un formulario para editar un menu.
   * Tambien busca todos los menus porque el menu puede tener padre.
   */
  public function edit($idMenu)
  {
    $menus = Menu::all();
    $menu = Menu::findOrFail($idMenu);
    return view('menu.edit', compact('menu'), compact('menus'));
  }

  /**
   *  Muestra un menu.
   */
  public function show(Menu $menu)
  {
    $menu = Menu::findOrFail($menu->idMenu);
    return view('menu.show', compact('menu'));
  }

  /**
   * Guarda un menu en la BD.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameMenu' => 'required|max:30',
      'urlMenu' => 'required|max:100',
      'order' => 'required',
    ], [
      'nameMenu.required' => 'El nombre del menú es obligatorio.',
      'nameMenu.max' => 'El nombre del menú no puede tener mas de 30 carácteres.',
      'urlMenu.required' => 'El url del menú es obligatorio.',
      'urlMenu.max' => 'El url del menú no puede tener mas de 100 carácteres.',
      'order.required' => 'El orden del menú es obligatorio.',
    ]);
    $menu = Menu::create($request->only(['nameMenu', 'urlMenu', 'order', 'parentId']));

    // Asignar roles al menú
    if ($request->has('roles')) {
      $menu->roles()->sync($request->roles);
    }


    return redirect()->route('menu.index')->with('success', 'Menu creado con éxito.');
  }

  /**
   * Actualiza un menu en la BD.
   */
  public function update(Request $request, Menu $menu)
  {
    $request->validate([
      'nameMenu' => 'required|max:30',
      'urlMenu' => 'required|max:100',
      'order' => 'required',
    ], [
      'nameMenu.required' => 'El nombre del menú es obligatorio.',
      'nameMenu.max' => 'El nombre del menú no puede tener mas de 30 carácteres.',
      'urlMenu.required' => 'El url del menú es obligatorio.',
      'urlMenu.max' => 'El url del menú no puede tener mas de 100 carácteres.',
      'order.required' => 'El orden del menú es obligatorio.',
    ]);
    $menu = Menu::find($menu->idMenu);
    $menu->update($request->only(['nameMenu', 'urlMenu', 'order', 'parentId']));

    // Asignar roles al menú
    if ($request->has('roles')) {
      $menu->roles()->sync($request->roles);
    } else {
      $menu->roles()->sync([]);
    }

    return redirect()->route('menu.index')->with('success', 'Menu actualizado con éxito.');
  }

  /**
   * Borra un Menu de la BD.
   */
  public function destroy($id)
  {
    $menu = Menu::find($id);
    $menu->habilitated = 0;
    $menu->save();
    return redirect()->route('menu.index')->with('success', 'Menu eliminado  con éxito.');
  }
  public function alta($id)
  {
    $menu = Menu::find($id);
    $menu->habilitated = 1;
    $menu->save();
    return redirect()->route('menu.index')->with('success', 'Menu eliminado  con éxito.');
  }

  /**
   * Busca menus habilitados = true segun un idrol y los ordena por el campo 'order'.
   */
  public function buscarMenus($idRol)
  {
    $menus = Menu::whereHas('roles', function ($query) use ($idRol) {
      $query->where('menu_roles.idRole', $idRol)
        ->where('menu_roles.habilitated', 1);
    })->where('menus.habilitated', 1)
      ->orderBy('order')
      ->get();
    return $menus;
  }

  /**
   * Busca los menus que son visibles para usuarios que no hayan iniciado sesion.
   */
  public function buscarMenusPublicos()
  {
    $menus = Menu::where('idMenu', 1)->orderBy('order')->get();
    return $menus;
  }

  /**
   * Recibo obj $menu -> busco en MenuRol con el metodo del controller.
   */
  public function buscarRolesMenu(Menu $menu)
  {
    $objMenuRoleController = new MenuRoleController();
    $objRoleController = new RoleController();
    $colIdRoles = $objMenuRoleController->darRoles($menu->idMenu);
    $colRoles = array();
    if (count($colIdRoles) > 0) {
      foreach ($colIdRoles as $idRole) {
        $role = $objRoleController->devolverObjRol($idRole->idRole);
        array_push($colRoles, $role);
      }
    }
    return $colRoles;
  }
}

