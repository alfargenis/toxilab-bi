<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $table = 'asignar'; // Especifica el nombre de la tabla

    public $timestamps = false; // Desactiva los timestamps si tu tabla no los usa

    protected $fillable = [
        'idInterfase',
        'idExamen',
        'idExAnalizador',
        'Activa',
        'idMetodo',
    ]; // Los atributos que son asignables masivamente

    // Relación con Examenes
    public function examen()
    {
        return $this->belongsTo(Examen::class, 'idExamen', 'ID');
    }

    // Relación con Interfases
    public function interfase()
    {
        return $this->belongsTo(Interfase::class, 'idInterfase', 'ID');
    }

    // Relación con Metodologia
    public function metodologia()
    {
        return $this->belongsTo(Metodologia::class, 'idMetodo', 'ID');
    }
}

