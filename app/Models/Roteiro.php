<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roteiro extends Model
{
    use HasFactory;
    protected $table = 'roteiro';
    protected $fillable = ['setor_id','material_id','servico_id','produto_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

   
    public function material(){ 
        return $this->belongsToMany(Material::class,'material_roteiro')->withTimestamps();;
    }
    
}
