<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'servico';
    protected $fillable = ['id_produto','id_setor','id_responsavel','id_tipoServico','dtInicio','dtFim','quantIni','quantConcluido'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function trabalhos(){
        return $this->hasMany(Trabalho::class);
    }
    public function setorExecutante(){
        return $this->hasMany(SetorExecutante::class);
    }
    public function roteiro(){ 
        return $this->belongsToMany(Material::class,'servico_setor')->withTimestamps();;
    }
}
