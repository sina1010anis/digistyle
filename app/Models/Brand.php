<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['Name' , 'Country' , 'Image'];

    public $timestamps = false;

    protected $attributes = ['Status' => 1];
}
