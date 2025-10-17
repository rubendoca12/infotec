<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table = 'asistentes';
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'evento_id',
    ];
    
    /**
     *(Asistente pertenece a un Evento).
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}