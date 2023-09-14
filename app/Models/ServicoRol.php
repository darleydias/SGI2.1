<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoRol extends Model
{
    use HasFactory;
    protected $table = 'servico_rol';
    protected $fillable = ['cod_operacao','cod_servico','desc','predecessor','especificacoes','obs','setor_id'];

    public function setorRol(){
        return $this->belongsTo(SetorRol::class);
    }
}
