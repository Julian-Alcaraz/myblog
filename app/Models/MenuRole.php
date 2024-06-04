<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    use HasFactory;
    protected $table = 'menu_roles';
    protected $primaryKey = ['idMenu', 'idRole']; 
    protected $fillable = ['idMenu', 'idRole', 'habilitated']; 
    public $incrementing = false;
    // Para que lo tome como boolean
    protected $casts = [
      'habilitated' => 'boolean',
    ];
}
