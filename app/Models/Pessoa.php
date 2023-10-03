<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = "pessoa";

    protected $casts = [
        'data_nascimento' => 'date:d/m/Y'
    ];
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento'
    ];

    public function getCpfFormatadoAttribute()
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $this->cpf);
    }
}
