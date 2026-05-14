<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'fecha',
        'hora',
        'descripcion',
    ];

    public function contactos()
    {
        return $this->belongsToMany(Contactos::class, 'cita_contacto', 'cita_id', 'contacto_id');
    }
}
