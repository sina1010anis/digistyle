<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_mobile extends Model
{
    use HasFactory;
    protected $table='t_mobiles';
    public $timestamps=false;

    public function t_user(){
        return $this->belongsTo(t_user::class);
    }
}
