<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Funcionalidade extends Model
{
    use HasFactory;
    protected $table = 'funcionalidade';
    protected $fillable = ['nome','URL','menu','sistema_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function grupo(){
        return $this->belongsToMany(Grupo::class,'funcionalidade_grupo');
    }

    public function sistema(){
        return $this->belongsTo(Sistema::class);
    }
}
