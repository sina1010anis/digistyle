<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $title='پنل مدریت';
        $order=orders::orderBy('id' , 'DESC')->get();
        $productsOrderUser=products::orderBy('id' , 'DESC')->get();
        return view('Admin.index' , compact('productsOrderUser','order','title'));
    }
}
