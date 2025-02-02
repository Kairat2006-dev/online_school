<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cource extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'cources';
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function sodercource(){
        return $this->hasOne(SoderCource::class);
    }
}
