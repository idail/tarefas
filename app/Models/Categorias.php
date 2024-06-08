<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "categorias";

    protected $fillable = [
        'categoria',
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefas::class, 'id_categoria', 'id');
    }
}
