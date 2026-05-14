<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $fillable = [
        'titulo',
        'fecha',
        'hora',
        'descripcion',
    ];

    public function contacto()
    {
        return $this->belongsToMany(Contactos::class, 'contacto_id');
    }
}
