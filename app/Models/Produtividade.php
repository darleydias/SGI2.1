<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtividade extends Model
{
    use HasFactory;
    protected $table='produtividade';
    protected $fillable=['producao_id','setorexEcutante_id','dia','quant','pessoa_id'];

    public function producao(){
        return $this->belongsTo(Producao::class);
    }
    public function setorExecutante(){
        return $this->belongsTo(SetorExecutante::class);
    }
    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

}
