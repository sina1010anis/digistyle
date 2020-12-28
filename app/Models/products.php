<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['Name' , 'DE' , 'price' , 'Country' , 'Status'];

    protected $attributes =['Category' => '0' , 'Image' => 'null' , 'SubMenu' => 0];

    public function getRouteKeyName()
    {
        return 'Name';
    }
}
