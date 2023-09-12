<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoa';
    protected $fillable = ['nomeCompleto','sexo','dtNasc','CPF','email','celular','id_setor'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function setor(){
        return $this->belongsTo(Setor::class);
    }
}
