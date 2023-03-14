<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'mae', 'data_nascimento', 'cpf', 'cns', 'file_path', 'cep', 
    'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado'
    ];

    // public function paciente()
    // {
    //     return $this->belongsTo(Paciente::class);
    // }
    // public function endereco() 
    // {
    //     return $this->belongsTo(Endereco::class);
    // }
}
