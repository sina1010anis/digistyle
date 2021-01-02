<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['id_user' , 'Orders' , 'CodeBank' , 'Name' , 'Email' , 'Mobile' , 'TotalPrice'];

    protected $attributes = ['Status' => 0 , 'SendProduct' => 0 , 'Address' => 0];

    protected $table = 'orders';
}
