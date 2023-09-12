<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaFiscal extends Model
{
    use HasFactory;
    protected $table = 'nota_fiscal';

    protected $fillable = ['idPedidoCompra','nf_nomeOriginal','nf_hash','nf_tamanho','nf_contentType','nf_path'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}