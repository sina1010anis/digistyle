<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys';
    protected $fillable = ['NameCategory' , 'Parent_id'];
    /**
     * @var bool
     */
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'NameCategory';
    }
}
