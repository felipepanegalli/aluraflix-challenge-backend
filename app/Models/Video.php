<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'url', 'categoriaId'];

    public function categorias(){
        return $this->hasOne(Categoria::class, 'categoriaId');
    }
}
