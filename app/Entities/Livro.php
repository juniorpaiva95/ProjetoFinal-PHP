<?php

namespace App\Entities;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use CrudTrait;
    public $fillable = [
        'titulo',
        'editora',
        'isbn',
        'paginas',
        'ano',
        'assunto',

    ];
    // Relacionamentos
    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }


}
