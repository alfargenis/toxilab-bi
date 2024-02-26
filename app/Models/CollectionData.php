<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionData extends Model
{
    use HasFactory;
    protected $table = 'collection_data'; // Nombre de la tabla en la base de datos
    protected $fillable = ['name', 'informe']; // Atributos que se pueden asignar masivamente

}
