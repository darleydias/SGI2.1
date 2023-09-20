<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialGasto extends Model
{
    use HasFactory;
    protected $table = 'material_gasto';
    protected $fillable = ['material_id','setorExecutante_id','quant'];
    
}
