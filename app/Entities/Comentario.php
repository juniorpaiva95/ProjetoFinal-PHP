<?php

namespace App\Entities;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use CrudTrait;

    public $fillable = ['texto', 'livro_id'];
    // Relacionamento

    // Um comentário pertence a um livro
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // Um comentário pertence a um usuário
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
