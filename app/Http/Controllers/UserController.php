<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return (view ('user.index', compact('usuarios')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
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
    public function show(User $user)
    {
        $user = user :: findOrFail($user->id);
        return view ('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //debe recuperar los roles para ser mostrados como opcion...
        $roles = Role::all();
        $user = User :: findOrFail($user->id);
        return view ('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'role' => 'required',
        ]);
        $user = User :: find($user->id);
        $user->update($request->all());
        return redirect()->route('user.index')
            ->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $user = User :: find($id);
        $user->habilitated = 0;
        $user->save();
        // $user->delete();
        // $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'Usuario eliminado exitosamente');
    }

    public function alta($id)
    {
        $user = User :: find($id);
        $user->habilitated = 1;
        $user->save();
        return redirect()->route('user.index')
            ->with('success', 'Usuario habilitado exitosamente');
    }

}
