<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roteiro extends Model
{
    use HasFactory;
    protected $table = 'roteiro';
    protected $fillable = ['nome','produto_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

   
    public function material(){ 
        return $this->belongsToMany(Material::class,'material_roteiro')->withTimestamps();;
    }
    public function setor(){ 
        return $this->belongsToMany(Roteiro::class,'roteiro_setor')->withTimestamps();;
    }
    
}
