<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produto';
    protected $fillable = ['nome','desc','cod','tipoProduto_id','peso'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function producoes(){
        return $this->hasMany(Producao::class);
    }
    public function sistema(){
        return $this->belongsTo(TipoProduto::class);
    }
}
