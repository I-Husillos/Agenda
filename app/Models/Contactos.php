<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
    ];

    public function citas()
    {
        return $this->belongsToMany(Citas::class, 'cita_contacto', 'contacto_id', 'cita_id');
    }
}
