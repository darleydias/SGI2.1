<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sistema extends Model
{
    use HasFactory;
    protected $table = 'sistema';
    protected $fillable = ['nome'];
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function funcionalidade(){
        return $this->hasMany(Funcionalidade::class);
    }
}
