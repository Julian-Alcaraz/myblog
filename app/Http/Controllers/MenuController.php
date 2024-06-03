<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $menus = Menu::all();
    return view('menu.index', compact('menus'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('menu.create');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $menu = Menu::findOrFail($id);
    return view('menu.edit', compact('menu'));
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $menu = Menu::findOrFail($id);
    return view('menu.show', compact('menu'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nameMenu' => 'required|max:30',
      'urlMenu' => 'required|max:100',
      'order' => 'required',
    ]);
    Menu::create($request->all());
    return redirect()->route('menu.index')
      ->with('success', 'Menu creado con éxito.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nameMenu' => 'required|max:30',
      'urlMenu' => 'required|max:100',
      'order' => 'required',
    ]);
    $menu = Menu::find($id);
    $menu->update($request->all());
    return redirect()->route('menu.index')
      ->with('success', 'Menu actualizado con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $menu = Menu::find($id);
    $menu->delete();
    return redirect()->route('menu.index')
      ->with('success', 'Menu eliminado  con éxito.');
  }
}
