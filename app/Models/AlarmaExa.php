<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlarmaExa extends Model
{
    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'AlarmaExa';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'idMuestra',
        'idExamen',
        'Fecha',
        'Status',
        'Alarma',
        'idUsuario',
    ];

    /**
     * Los atributos que deberían ser mutados a fechas.
     *
     * @var array
     */
    protected $dates = [
        'Fecha',
    ];

    /**
     * Indica si el modelo debe ser timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

