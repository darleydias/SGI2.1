<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProduto extends Model
{
    use HasFactory;
    protected $table = 'tipo_produto';
    protected $fillable = ['nome'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
