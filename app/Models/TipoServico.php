<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoServico extends Model
{
    use HasFactory;
    protected $table = 'tipo_servico';
    protected $fillable = ['nome'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function servicos(){
        return $this->hasMany(Servico::class);
    }
}
