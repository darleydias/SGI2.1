<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialRoteiro extends Model
{
    use HasFactory;
    protected $table = 'material_roteiro';
    protected $fillable = ['roteiro_id','material_id'];
    
}
