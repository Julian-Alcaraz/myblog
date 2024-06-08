<?php

namespace App\Http\Controllers;

use App\Models\MenuRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(MenuRole $menuRole)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(MenuRole $menuRole)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, MenuRole $menuRole)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(MenuRole $menuRole)
  {
    //
  }

  /**
   * Da los roles asociados a un menu.
   *
   * QUIZA USANDO "->pluck('idRole')" O ALGO PARECIDO QUEDE MEJOR, FUNCIONA AHORA!!!
   */
  public function darRoles($idMenu)
  {
    $menuRole = MenuRole::where('idMenu', $idMenu)->get();
    $i = 0;
    $colRoles = array();
    if (count($menuRole) > 0) {
      do {
        $role = $menuRole[$i];
        $colRoles[$i] = $role;
        $i++;
      } while ($i < count($menuRole));
    }
    return $colRoles;
  }
}
