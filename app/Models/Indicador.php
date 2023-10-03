<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicador extends Model
{
    use HasFactory;
    protected $table = 'indicador';
    protected $fillable = ['nome','polaridade','formula','unidade','fonte','finalistico'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function metas(){
        return $this->hasMany(Meta::class);
    }
}
