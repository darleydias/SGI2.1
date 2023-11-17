<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosInjetora extends Model
{
    use HasFactory;
    protected $table = 'estados_injetoras';
    protected $fillable = ['estado','id_maquina','unixtime'];    
}
