<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorExecutante extends Model
{
    use HasFactory;
    protected $table = 'setor_executante';
    protected $fillable = ['id_setor','id_producao','dtInicio','dtFim','quantIni','quantAtual','faltam'];

    public function setor(){
        return $this->belongsTo(Setor::class);
    }
    public function producao(){
        return $this->belongsTo(Producao::class);
    }
    public function servicos(){
        return $this->hasMany(ServicoExecutado::class);
    }

}
