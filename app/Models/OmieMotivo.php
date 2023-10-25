<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OmieMotivo extends Model
{
    use HasFactory;
    protected $table = 'omie_motivo';
    protected $fillable = ['cDescricao','cObservacao','nCodigo'];

}
