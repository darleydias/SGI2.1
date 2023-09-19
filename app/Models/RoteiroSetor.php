<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoteiroSetor extends Model
{
    use HasFactory;
    protected $table = 'roteiro_setor';
    protected $fillable = ['roteiro_id','setor_id'];
}
