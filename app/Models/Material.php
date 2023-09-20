<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $fillable = ['cod','desc','quant','unid'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function roteiro(){ 
        return $this->belongsToMany(Roteiro::class,'roteiro')->withTimestamps();;
    }
    public function materialGasto(){ 
        return $this->hasMany(MaterialGasto::class,'material_gasto')->withTimestamps();;
    }
}
