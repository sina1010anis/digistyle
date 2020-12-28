<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    use HasFactory;
    protected $table='baners';
    public $timestamps = false;

    protected $fillable = ['Name' , 'Image' , 'id_brand'];
}
