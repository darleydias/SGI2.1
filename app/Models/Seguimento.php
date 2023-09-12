<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimento extends Model
{
    use HasFactory;
    protected $table = 'seguimento';
    protected $fillable = ['nome'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function clientes(){
        return $this->hasMany(Cliente::class);
    }
}
