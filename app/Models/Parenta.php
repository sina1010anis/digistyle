<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parenta extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = ['NameParent'];

    public $timestamps = false;
}
