<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function queueNumber()
    {
        return $this->belongsTo(QueueNumber::class);
    }

    public function scopeSearching($query, $keyword)
    {
        $query->when($keyword, function ($query, $keyword) {
            return $query->where('status', 'like', '%' . $keyword . '%')
                ->orWhere('t_equipo', 'like', '%' . $keyword . '%')
                ->orWhere('modelo', 'like', '%' . $keyword . '%')
                ->orWhere('marca', 'like', '%' . $keyword . '%')
                ->orWhere('serial', 'like', '%' . $keyword . '%')
                ->orWhere('adquisicion', 'like', '%' . $keyword . '%')
                ->orWhere('precio_adquisicion', 'like', '%' . $keyword . '%')
                ->orWhere('vida_util', 'like', '%' . $keyword . '%')
                ->orWhere('ubicacion', 'like', '%' . $keyword . '%')
                ->orWhere('responsable', 'like', '%' . $keyword . '%');
        });
    }
}
