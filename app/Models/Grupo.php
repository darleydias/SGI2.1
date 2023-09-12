<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupo';
    protected $fillable = ['nome'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){ 
        return $this->belongsToMany(User::class,'grupo_usuario')->withTimestamps();;
    }
    public function funcionalidade(){ 
        return $this->belongsToMany(Funcionalidade::class,'funcionalidade_grupo')->withTimestamps();;
    }
}
