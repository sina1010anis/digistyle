<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = ['User_id' , 'Product_id' , 'Price' , 'Number'];
    public $timestamps = false;
}
