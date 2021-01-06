<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\orders;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $orders = orders::where('id_user', auth()->user()->id)->count();
        $ordersStop = orders::where('id_user', auth()->user()->id)->where('SendProduct', 0)->count();
        $ordersOK = orders::where('id_user', auth()->user()->id)->where('SendProduct', 1)->count();
        return view('User.Menu.ViewProfile', compact('ordersOK', 'ordersStop', 'orders'))->with('msg', 'پنل کاربری');
    }

    public function EditProfile()
    {
        $orders = orders::where('id_user', auth()->user()->id)->count();
        $ordersStop = orders::where('id_user', auth()->user()->id)->where('SendProduct', 0)->count();
        $ordersOK = orders::where('id_user', auth()->user()->id)->where('SendProduct', 1)->count();
        return view('User.Menu.EditProfile', compact('ordersOK', 'ordersStop', 'orders'))->with('msg', 'ویرایش پروفایل');
    }

    public function EditProfileCreateUser(User $id, Request $request)
    {
        $v = $request->validate([
            'Name' => 'required|min:2|max:20',
            'CodeMil' => 'required|min:10|max:10',
            'Phone' => 'required|min:8|max:8',
            'SexUserProfile' => 'required',
            'email' => 'required|min:5|max:50|email',
            'Mobile' => 'required|min:11|max:11',
        ]);
        $id->Name = $request->Name;
        $id->CodeMil = $request->CodeMil;
        $id->Phone = $request->Phone;
        $id->Sex = $request->SexUserProfile;
        $id->email = $request->email;
        $id->Mobile = $request->Mobile;
        $id->save();
        return back()->with('msg', 'پروفایل شما ویرایش شد');
    }

    public function ViewOrders()
    {
        $orders = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->count();
        $ordersViewOrders = orders::where('id_user', auth()->user()->id)->where('CodeBank', '!=', '0')->orderBy('id', 'DESC')->get();
        $ordersStop = orders::where('id_user', auth()->user()->id)->where('SendProduct', 0)->count();
        $ordersOK = orders::where('id_user', auth()->user()->id)->where('SendProduct', 1)->count();
        $products = products::orderBy('id', 'DESC')->get();
        return view('User.Menu.ViewOrders', compact('products', 'ordersOK', 'ordersViewOrders', 'ordersStop', 'orders'))->with('msg', 'ویرایش پروفایل');
    }

    public function ViewCart()
    {
        $orders = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->count();
        $ordersStop = orders::where('id_user', auth()->user()->id)->where('SendProduct', 0)->count();
        $ordersOK = orders::where('id_user', auth()->user()->id)->where('SendProduct', 1)->count();
        $cartsViewPanelUser = DB::table('carts as t1')->where('t1.User_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->leftJoin('products as t2', 't1.Product_id', '=', 't2.id')
            ->select('t1.*', 't2.Name')
            ->get();;
        return view('User.Menu.ViewCart', compact('ordersOK', 'cartsViewPanelUser', 'ordersStop', 'orders'))->with('msg', 'ویرایش پروفایل');
    }

    public function ViewComments()
    {
        $orders = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->count();
        $ordersStop = orders::where('id_user', auth()->user()->id)->where('SendProduct', 0)->count();
        $ordersOK = orders::where('id_user', auth()->user()->id)->where('SendProduct', 1)->count();
        $ViewCommentsPanelUser = DB::table('comments as t1')->where('t1.id_user', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->leftJoin('products as t2', 't1.id_product', '=', 't2.id')
            ->select('t1.Status', 't1.created_at', 't1.Text', 't1.id', 't2.Name')
            ->get();;
        return view('User.Menu.ViewComments', compact('ordersOK', 'ViewCommentsPanelUser', 'ordersStop', 'orders'))->with('msg', 'ویرایش پروفایل');
    }

    public function NewImageProfileUser(Request $request)
    {
        if ($request->ajax()) {
            $tmp = $request->file('imageProfile');
            $NameImage = $tmp->getClientOriginalName();
            $SizeImage = $tmp->getSize() / 1024;
            $TypeImage = $tmp->getClientMimeType();
            $SizeImage2 = $SizeImage / 1024;
            $v = $request->validate([
                'imageProfile' => 'required'
            ]);
            if ($SizeImage2 > 2) {
                return 'ERR:UploadSize';
            } else {
                if ($TypeImage == 'image/jpeg' || $TypeImage == 'image/png') {
                    $tmp->move(public_path('/Data_User/Image/ImageProfile/'), $NameImage);
                    DB::table('users')->where('id', auth()->user()->id)->update(['Image' => $NameImage]);
                    return 'Uploaded';
                } else {
                    return 'ERR:UploadType';
                }
            }
        }
    }
}
