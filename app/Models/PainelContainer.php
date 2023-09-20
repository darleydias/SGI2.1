<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PainelContainer extends Model
{
    use HasFactory;
    protected $table ='painel_container';
    protected $fillable = ['op_id','qt_prev','qt_real','percent','setor_id'];
}
