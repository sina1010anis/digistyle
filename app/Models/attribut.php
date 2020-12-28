<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribut extends Model
{
    use HasFactory;
    protected $table = 'attribut';

    protected $fillable = ['id_product' , 'Name' , 'Item'];

    public $timestamps = false;


}
