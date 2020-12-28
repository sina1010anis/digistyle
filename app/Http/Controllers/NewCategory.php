<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ItemChild;
use App\Models\Parenta;
use App\Models\t_mobile;
use App\Models\T_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewCategory extends Controller
{
    public function category(Parenta $parenta){
        $title='اضافه کردن دسته جدید';
        $dataS=Parenta::orderBy('id','DESC')->get();
        $ItemParent=Parenta::orderBy('id' , 'DESC')->get();
        $ItemCategory=Category::orderBy('id' , 'DESC')->get();
        $ItemItem=ItemChild::orderBy('id' , 'DESC')->get();
        return view('Admin.NewCategory' , compact('title' , 'dataS' , 'ItemParent' , 'ItemCategory' , 'ItemItem'));
    }
    public function parentCategory(Request $request , Category $category){
        $msg=[
            'NameParent.required' => 'فیلد دسته اصلی را وارد کنید'
        ];
        $v= $request->validate([
            'NameParent' => 'required'
        ],$msg);
        $new= new Parenta([
            'NameParent' => $request->NameParent
        ]);
        $new->save();
        return redirect(route('category_admin'))->with('msg' , 'دسته اصلی اضافه شد');

    }
    public function ChildCategory(Request $request){
        $msg=[
            'NameCategory.required' => 'فیلد زیر مجموعه را وارد کنید'
        ];
        $v= $request->validate([
            'NameCategory' => 'required',
        ],$msg);
        $new= new Category([
            'NameCategory' => $request->NameCategory,
            'Parent_id' => $request->Parent_id
        ]);
        $new->save();
        return redirect(route('category_admin'))->with('msg' , 'زیر دسته اضافه شد');
    }
    public function ItemChildCategory(Request $request){
        $msg=[
            'NameItem.required' => 'فیلد زیر دسته را وارد کنید'
        ];
        $v= $request->validate([
            'NameItem' => 'required',
        ],$msg);
        $new= new ItemChild([
            'NameItem' => $request->NameItem,
            'Child_id' => $request->Child_id
        ]);
        $new->save();
        return redirect(route('category_admin'))->with('msg' , 'زیر دسته اضافه شد');
    }
    public function ParentDeleteCategory(Parenta $id){
        Category::where('Parent_id' , $id->id)->delete();
        $id->delete();
        return redirect(route('category_admin'))->with('msg' , 'دسته اصلی حذف شد');
    }
    public function ChildDeleteCategory(Category $id){
        ItemChild::where('Child_id' , $id->id)->delete();
        $id->delete();
        return redirect(route('category_admin'))->with('msg' , 'زیر مجموعه حذف شد');
    }

    public function EditParentCategory(Request $request , Parenta $parenta){
        $msg=[
            'Text_Edit.required' => 'فیلد دسته اصلی را وارد کنید'
        ];
        $v= $request->validate([
            'Text_Edit' => 'required',
        ],$msg);

        Parenta::where('id' , $request->ID)->update(['NameParent' => $request->Text_Edit]);
        return redirect(route('category_admin'))->with('msg' , 'متن مورد نظر ویرایش شد');

    }

    public function EditChildCategory(Request $request , Parenta $parenta){
        $msg=[
            'Text_Edit.required' => 'فیلد دسته اصلی را وارد کنید'
        ];
        $v= $request->validate([
            'Text_Edit' => 'required',
        ],$msg);

        Category::where('id' , $request->ID)->update(['NameCategory' => $request->Text_Edit]);
        return redirect(route('category_admin'))->with('msg' , 'متن مورد نظر ویرایش شد');

    }

    public function EditItemCategory(Request $request , Parenta $parenta){
        $msg=[
            'Text_Edit.required' => 'فیلد دسته اصلی را وارد کنید'
        ];
        $v= $request->validate([
            'Text_Edit' => 'required',
        ],$msg);

        ItemChild::where('id' , $request->ID)->update(['NameItem' => $request->Text_Edit]);
        return redirect(route('category_admin'))->with('msg' , 'متن مورد نظر ویرایش شد');
    }



    public function Test(){
        $user=t_mobile::find(2);
        echo($user->t_user->name);
        /*        return view('welcome' , compact('user'));*/
    }
}
