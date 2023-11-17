<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class injetora extends Model
{
    use HasFactory;
    protected $table = 'injetora';
    protected $fillable = ['corrente','estado','id_maquina','created_at'];
}
