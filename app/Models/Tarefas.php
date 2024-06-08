<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = "id";
    public $table = "tarefas";

    protected $fillable = [
        'nome',
        "id_categoria",
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria', 'id');
    }
}