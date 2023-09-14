<?php

// app/Models/Usuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'email', // Adicione 'email' à lista de atributos preenchíveis
        'nome',
        'username',
        'password',
    ];
}
