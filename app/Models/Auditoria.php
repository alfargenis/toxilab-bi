<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'Auditoria';

    // Especifica la clave primaria si no es 'id'
    protected $primaryKey = 'ID';

    // Desactiva los timestamps si no tienes las columnas created_at y updated_at
    public $timestamps = false;

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = [
        'Area',
        'TipEve',
        'Numero',
        'Numero2',
        'Imec',
        'Fecha',
        'Descrip',
        'Estacion',
        'idUsuario',
        'StatusExa',
    ];

    // Define los campos que deben ser tratados como fechas
    protected $dates = [
        'Fecha',
    ];

    // Aquí puedes añadir relaciones, mutadores, y cualquier otra lógica de negocio relacionada con tu modelo
}
