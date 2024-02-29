<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class antibiograma extends Model
{
    protected $table = 'bdo.antibiograma'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria, ajusta esto si tu tabla usa una clave primaria diferente
    
    public $incrementing = true; // Ajusta esto según si tu clave primaria es autoincrementable o no

    protected $fillable = [
        'idBac', 'idMOrg', 'idAnt', 'Metodo', 'Result', 'Sens'
    ]; // Los atributos que son asignables masivamente

    // Aquí puedes definir relaciones, scopes, y otros comportamientos específicos del modelo.
}
