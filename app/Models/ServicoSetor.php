<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoSetor extends Model
{
    use HasFactory;
    protected $table = 'servico_setor';
    protected $fillable = ['servico_id','setor_id'];
    
}
