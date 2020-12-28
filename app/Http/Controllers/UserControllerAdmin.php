<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserControllerAdmin extends Controller
{
    public function index(){
        $title='ثبت کاربر';
        return view('Admin.User.index' , compact('title'));
    }
    public function store(Request $request , User $user){
        $v=$request->validate([
            'Name' => 'required',
            'email' => 'required|email|max:50|unique:users',
            'Password' => 'required|min:8|max:30',
        ]);
        $password = Hash::make($request->Password);
            $user->name = $request->Name;
            $user->email = $request->email;
            $user->password = $password;
            $user->Roule = $request->Roule;
            $user->Sex = $request->Sex;

        $user->save();
        return redirect(route('UserNewPage_admin'))->with('msg' , 'کاربر اضافه شد');
    }
    public function create(){
        $title='مشاهده کاربران';
        $DataUsers=User::orderBy('id' , 'DESC')->paginate(5);
        return view('Admin.User.ViewAll' , compact('title' , 'DataUsers'));
    }
    public function delete(User $user){
        $user->delete();
        return redirect(route('ViewUserAll_admin'))->with('msg' , 'کاربر مورد نظر حذف شد.');
    }
    public function ShowEdit(User $user){
        $title=' تغییر کاربر '.$user->Name;
        return view('Admin.User.View' , compact('title' , 'user'));
    }
    public function Update(Request $request , User $user){
        $v=$request->validate([
           'Name' => 'required|min:2|max:30',
           'email' => 'email|required|max:35',
           'password' => 'max:20'
        ]);
        $password=Hash::make($request->password);
        $user->Name = $request->Name;
        $user->email = $request->email;
        $user->password = $password;

        $user->save();

        return redirect(route('ViewUserAll_admin'))->with('msg' , 'کاربر مورد نظر ویرایش شد.');
    }
    public function show(User $user){
        $title=' مشخصات کاربر '.$user->Name;
        return view('Admin.User.ShowUserOne' , compact('title' , 'user'));
    }
}
