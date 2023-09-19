<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'servico';
    protected $fillable = ['cod_operacao','cod_servico','desc','predecessor','especificacoes','obs'];

    public function setor(){
        return $this->belongsTo(Setor::class);
    }
}
