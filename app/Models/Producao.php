<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producao extends Model
{
    use HasFactory;
    protected $table = 'producao';
    protected $fillable = ['produto_id','qt','opNum','dataInicio','dataPrevista','dataEntrega','obs','cliente_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function sistema(){
        return $this->belongsTo(Produto::class);
    }
    public function container(){
        return $this->hasMany(PainelContainer::class);
    }
    
}
