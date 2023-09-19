<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'servicoExecutado';
    protected $fillable = ['id_produto','id_setorExecutante','id_responsavel','id_tipoServico','dtInicio','dtFim','quantIni','quantConcluido'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function trabalhos(){
        return $this->hasMany(Trabalho::class);
    }
    public function setorExecutante(){
        return $this->belongsTo(SetorExecutante::class);
    }
}
