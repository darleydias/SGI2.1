<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    use HasFactory;
    protected $table = 'setor';
    protected $fillable = ['nome','peso'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function funcionarios(){
        return $this->hasMany(Pessoa::class);
    }
}
