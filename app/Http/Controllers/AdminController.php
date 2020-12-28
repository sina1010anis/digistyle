<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $title='پنل مدریت';
        return view('Admin.index' , compact('title'));
    }
}
