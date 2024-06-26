<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  use HasFactory;
  protected $table = 'menus';
  protected $primaryKey = 'idMenu';
  protected $fillable = [
    'nameMenu',
    'urlMenu',
    'order',
    'parentId',
  ];
  // Para que lo tome como boolean
  protected $casts = [
    'habilitated' => 'boolean',
  ];
  // Relacion entre menu y rol
  public function roles()
  {
    return $this->belongsToMany(Role::class, 'menu_roles', 'idMenu', 'idRole')->withPivot('habilitated')->withTimestamps();
  }
}
