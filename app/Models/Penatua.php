<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penatua extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penatua';
    protected $foreignKey = 'id_jemaat';

    protected $guarded = [];

    public function user_jemaat(){
        return $this->belongsTo(UserJemaat::class, $this->foreignKey);
    }

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }
}
