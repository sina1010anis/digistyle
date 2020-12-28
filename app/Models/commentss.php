<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentss extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['id_user' , 'id_product' , 'Name' , 'Text' , 'Buy'];

    protected $attributes = ['Status' => 0 , 'parent_id' => 0];

}


