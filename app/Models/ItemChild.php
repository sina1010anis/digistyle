<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemChild extends Model
{
    use HasFactory;
    protected $table ='item_children';
    protected $fillable =['NameItem' , 'Child_id'];
    public $timestamps=false;
}
