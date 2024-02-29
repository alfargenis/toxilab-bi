<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_reactivos extends Model
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
            return $query->where('id_equipo', 'like', '%' . $keyword . '%')
                ->orWhere('id_reactivos', 'like', '%' . $keyword . '%');
        });
    }
}
