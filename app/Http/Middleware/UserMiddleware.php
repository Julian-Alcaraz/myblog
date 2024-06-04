<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $post = $request->route('post');
      $userId = Auth::user()->id;
      $idRoleUser = Auth::user()->idRole;
      $idUserPost = $post->idUserPoster;
      // Si el usuario es distinto al del post y el rol es usuario no puede
      if (($userId !== $idUserPost) && ($idRoleUser == 1)) { 
          return redirect()->route('dashboard');
      }
      return $next($request);
    }
}
