<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cliente';
    protected $fillable = ['nome','CNPJ','cel','email','contato','insEst','insMun','seguimento_id','cliente_status'];
    protected $dates = ['deleted_at'];

    public function sistema(){
        return $this->belongsTo(Seguimento::class);
    }
}
