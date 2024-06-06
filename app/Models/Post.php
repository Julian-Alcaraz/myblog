<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  protected $table = 'posts';
  protected $primaryKey = 'idPost';
  protected $fillable = [
    'titlePost',
    'contentPost',
  ];
  // Para que lo tome como boolean
  protected $casts = [
    'habilitated' => 'boolean',
  ];
}
