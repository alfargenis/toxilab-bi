<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compras extends Model
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
            return $query->where('factura', 'like', '%' . $keyword . '%')
                ->orWhere('fecha_compra', 'like', '%' . $keyword . '%')
                ->orWhere('precio_unitario', 'like', '%' . $keyword . '%')
                ->orWhere('status', 'like', '%' . $keyword . '%')
                ->orWhere('id_proveedor', 'like', '%' . $keyword . '%')
                ->orWhere('id_reactivo', 'like', '%' . $keyword . '%');
        });
    }
}
