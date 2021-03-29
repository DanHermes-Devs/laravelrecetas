<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    // Campos que se añadiran
    protected $fillable = [
        'titulo_receta', 'ingredientes', 'preparacion', 'imagen', 'categoria_id'
    ];


    // Obtiene la categoria de la receta via FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
}
