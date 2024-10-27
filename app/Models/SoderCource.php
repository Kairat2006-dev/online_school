<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoderCource extends Model
{
    use HasFactory;

    protected $guarded = false;
    public function cource(){
        return $this->belongsTo(Cource::class, );
    }
}
