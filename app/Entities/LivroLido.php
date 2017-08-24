<?php

namespace App\Entities;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class LivroLido extends Model
{
    use CrudTrait;
    protected $fillable = [
      'livro_id', 'user_id'
    ];
    // Relacionamento

    // Relacionamentos
    public function livro()
    {
        return $this->belongsTo(Livro::class,'livro_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
