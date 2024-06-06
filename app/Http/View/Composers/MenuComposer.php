<?php
namespace App\Http\View\Composers;

use App\Http\Controllers\MenuController;
use Illuminate\View\View;
use App\Models\Menu;
use App\Models\MenuRole;
use Illuminate\Support\Facades\Auth;

class MenuComposer
{
  public function compose(View $view)
  {
    $objMenuController = new MenuController();
    $userRole = Auth::check() ? Auth::user()->idRole : null;
    if ($userRole == null)
    {
      // Menus publicos para usuarios que no se logearon
      $menus = $objMenuController->buscarMenusPublicos();
    }
    else
    {
      // Menus segun rol
      $menus = $objMenuController->buscarMenus($userRole);
    }

    $view->with('menus', $menus);
  }
}
