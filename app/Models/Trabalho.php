<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabalho extends Model
{
    use HasFactory;
    protected $table = 'trabalho';
    protected $fillable = ['id_executor','id_servicoExecutado','tempoInicio','tempoFim','trabalhoPausa'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function sistema(){
        return $this->belongsTo(Servico::class);
    }
}
