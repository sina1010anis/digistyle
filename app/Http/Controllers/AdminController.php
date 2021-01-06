<?php

namespace App\Http\Controllers;

use App\Models\commentss;
use App\Models\orders;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $title='پنل مدریت';
        $order=orders::orderBy('id' , 'DESC')->get();
        $users=User::orderBy('id' , 'DESC')->get();
        $TotalPriceToWebSit=orders::orderBy('id' , 'DESC')->where('Status' , 200)->where('Orders' , '!=' , '0')->get('TotalPrice');
        $ShitTotalPriceToWebSit=0;
        foreach ($TotalPriceToWebSit as $i){
            $ShitTotalPriceToWebSit+=$i->TotalPrice;
        }
        $comment=commentss::orderBy('id' , 'DESC')->get();
        $productsOrderUser=products::orderBy('id' , 'DESC')->get();
        $ordersZing=orders::select('id_user' , DB::raw('count(*) as sums'))->groupBy('id_user')->orderBy('sums' , 'DESC')->get();
        return view('Admin.index' , compact('ordersZing','productsOrderUser','users','ShitTotalPriceToWebSit','comment','order','title'));
    }
    public function EditCommentsProducts(commentss $id)
    {
        if ($id->Status == 0) {
            $id->Status = 1;
        } elseif ($id->Status == 1) {
            $id->Status = 0;
        }
        $id->save();

        return back()->with('msg', 'کامنت ویرایش شد');
    }
}
