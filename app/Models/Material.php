<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $fillable = ['cod','desc','quant','unid'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function roteiro(){ 
        return $this->belongsToMany(Material::class,'material_roteiro')->withTimestamps();;
    }
}
