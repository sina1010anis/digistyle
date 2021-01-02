<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OredersUserAdmin extends Controller
{
    public function Index()
    {
        $orders=DB::table('orders as t1')->orderBy('id' , 'DESC')
            ->leftJoin('address as t2' , 't2.id' , 't1.Address')
            ->select('t1.*' , 't2.State' , 't2.City'  , 't2.CodePost' , 't2.Phone'  , 't2.address')
            ->paginate(5);
        return view('Admin.Orders.index' , compact('orders'))->with('title' , 'سفارشات');
    }
    public function Show(orders $id){
        $order=DB::table('orders as t1')->where('t1.id' , $id->id)
            ->leftJoin('address as t2' , 't2.id' , 't1.Address')
            ->select('t1.*' , 't2.State' , 't2.City'  , 't2.CodePost' , 't2.Phone'  , 't2.address')
            ->get();
        $productsOrderUser=products::orderBy('id' , 'DESC')->get();
        return view('Admin.Orders.ViewOneOrder' , compact('productsOrderUser','order'))->with('title' , 'مشاهده فاکتور ');
    }
    public function EditSendStatusProducts(orders $id){
        if ($id->SendProduct == 0){
            $id->SendProduct = 1;
        }elseif ($id->SendProduct == 1){
            $id->SendProduct = 2;
        }elseif ($id->SendProduct == 2){
            $id->SendProduct = 3;
        }elseif ($id->SendProduct == 3){
            $id->SendProduct = 4;
        }elseif ($id->SendProduct == 4){
            $id->SendProduct = 5;
        }
        $id->save();
        return back()->with('msg' , 'وضعیت تغغیر کرد');
    }
}
