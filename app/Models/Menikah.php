<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menikah extends Model
{
     use HasFactory, SoftDeletes;

     protected $table = 'menikah';

     protected $guarded = [];


     public function alkitab(){
          return $this->belongsTo(Alkitab::class);
     }
}
