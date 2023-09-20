<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoServico extends Model
{
    use HasFactory;
    protected $table = 'produto_servico';
    protected $fillable = ['produto_id','servico_id','setor_id','quant'];

}
