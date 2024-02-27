<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
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
            return $query->where('nombre_archivo', 'like', '%' . $keyword . '%')
                ->orWhere('tipo_archivo', 'like', '%' . $keyword . '%')
                ->orWhere('tamano_archivo', 'like', '%' . $keyword . '%')
                ->orWhere('ruta_archivo', 'like', '%' . $keyword . '%');
        });
    }
}