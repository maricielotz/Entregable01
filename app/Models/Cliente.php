<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni'; // Definimos la clave primaria personalizada
    protected $keyType = 'string'; // Indicamos que el tipo de la clave primaria es string
    public $incrementing = false; // Indicamos que la clave primaria no es autoincremental
    protected $fillable = [ // Definimos los campos que pueden ser asignados masivamente
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'direccion',
        'ciudad',
    ];

    // Definimos las relaciones con otras tablas

    public function reservacion()
    {
        return $this->hasOne(Reservaciones::class, 'cliente_dni', 'dni');
    }

    public function promocion()
    {
        return $this->hasOne(Promociones::class, 'nro_promocion', 'cliente_dni');
    }

    //public function usuario()
    //{
    //    return $this->hasOne(Usuario::class, 'persona_dni', 'dni');
    //}
}
