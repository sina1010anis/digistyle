<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_user extends Model
{
    use HasFactory;

    protected $table= 't_users';
    public $timestamps = false;

    public function t_mobiles(){
        return $this->hasMany(t_mobile::class);
    }
}
