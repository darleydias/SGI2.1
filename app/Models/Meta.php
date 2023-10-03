<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meta extends Model
{
    use HasFactory;
    protected $table = 'meta';
    protected $fillable = ['indicador_id','valor','periodicidade','setor_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Indicador(){
        return $this->belongsTo(Indicador::class);
    }

}
