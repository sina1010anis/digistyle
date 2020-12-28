<?php

namespace App\Http\Controllers;

use App\Models\attribut;
use App\Models\Carts;
use App\Models\Category;
use App\Models\commentss;
use App\Models\Image;
use App\Models\ItemChild;
use App\Models\products;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class IndexController extends Controller
{
    public function ViewAllSubMenu(Category $id)
    {
        $name = $id->NameCategory;
        $idS = $id->id;
        $products = DB::table('products as t1')->orderBy('t1.id', 'DESC')->where('t1.SubMenu', $id->id)
            ->leftJoin('categorys as t2', 't1.SubMenu', '=', 't2.id')
            ->leftJoin('item_children as t3', 't3.id', '=', 't1.Category')
            ->select('t1.*', 't2.NameCategory', 't3.NameItem')
            ->paginate(3);
        $sizes = Size::orderBy('id', 'DESC')->get();
        $MaxPrice=products::where('SubMenu' , $id->id)->max('Price');
        $MinPrice=products::where('SubMenu' , $id->id)->min('Price');
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $productsParPage = $products->perPage();
        $productsTotal = $products->total();
        $Numebrs=1;
        return view('Front.ViewSubMenu', compact( 'Numebrs','MaxPrice','MinPrice','productsTotal', 'productsParPage', 'name', 'products', 'idS', 'sizes', 'Images', 'Images2'))->with('title', $name);

    }

    public function SelectItemSubMenu(Request $request)
    {
        $msg=[
            'checkboxItemChild.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v=$request->validate([
            'checkboxItemChild' => 'required'
        ],$msg);
        $id= ItemChild::where('id',$request->checkboxItemChild )->get('Child_id');
        $name= ItemChild::whereIn('id',$request->checkboxItemChild )->get();
        $idS='';
        foreach ($id as $i){
            //$Arr=json_encode($i);
            $idS.=$i->Child_id;
        }

        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $products=products::wherein('Category' , $request->checkboxItemChild)->get();
        $productsIDStatus=products::wherein('Category' , $request->checkboxItemChild)->paginate(1);
        $idP='';
        foreach ($productsIDStatus as $i){
            //$Arr=json_encode($i);
            $idP.=$i->Status;
        }
        $Numebrs=0;
        return view('Front.Menu.ViewSubMenu' , compact('Numebrs','idP','idS','products' ,'name', 'Images2' , 'Images' , 'sizes'));
    }
    public function SelectAttrMenu(Request $request)
    {
        $msg=[
            'checkboxAttr.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v=$request->validate([
            'checkboxAttr' => 'required'
        ],$msg);
        $name= $request->checkboxAttr;
        $products=DB::table('attribut as t1')->whereIn('t1.Item' , $request->checkboxAttr)
            ->leftJoin('products as t2' , 't2.id' , 't1.id_product')
            ->select('t2.*' , 't1.id_product')
            ->leftJoin('categorys as t3', 't2.SubMenu', '=', 't3.id')
            ->leftJoin('item_children as t4', 't4.id', '=', 't2.Category')
            ->select('t2.*', 't3.NameCategory', 't4.NameItem')
            ->get();
        $id= ItemChild::where('id',$request->checkboxAttr )->get('Child_id');
        $idS='';
        foreach ($id as $i){
            //$Arr=json_encode($i);
            $idS.=$i->Child_id;
        }
        $productsIDStatus=products::wherein('Category' , $request->checkboxAttr)->paginate(1);
        $idP='';
        foreach ($productsIDStatus as $i){
            //$Arr=json_encode($i);
            $idP.=$i->Status;
        }
        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $Numebrs=0;
        return view('Front.Menu.ViewSubMenu' , compact('Numebrs','name','Images2','idP','idS','products' , 'Images' , 'sizes'));
    }
    public function SelectAttrMenuGpu(Request $request){
        $msg=[
            'checkboxAttrGpu.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v=$request->validate([
            'checkboxAttrGpu' => 'required'
        ],$msg);
        $name= $request->checkboxAttrGpu;
        $products=DB::table('attribut as t1')->whereIn('t1.Item' , $request->checkboxAttrGpu)
            ->leftJoin('products as t2' , 't2.id' , 't1.id_product')
            ->select('t2.*' , 't1.id_product')
            ->leftJoin('categorys as t3', 't2.SubMenu', '=', 't3.id')
            ->leftJoin('item_children as t4', 't4.id', '=', 't2.Category')
            ->select('t2.*', 't3.NameCategory', 't4.NameItem')
            ->get();
        $id= ItemChild::where('id',$request->checkboxAttrGpu )->get('Child_id');
        $MinPrice=products::whereIn('Item' , $request->checkboxAttr)->min('Price');
        $idS='';
        foreach ($id as $i){
            //$Arr=json_encode($i);
            $idS.=$i->Child_id;
        }
        $productsIDStatus=products::wherein('Category' , $request->checkboxAttrGpu)->paginate(1);
        $idP='';
        foreach ($productsIDStatus as $i){
            //$Arr=json_encode($i);
            $idP.=$i->Status;
        }
        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $Numebrs=0;
        return view('Front.Menu.ViewSubMenu' , compact('Numebrs','MinPrice','name','Images2','idP','idS','products' , 'Images' , 'sizes'));
    }
    public function SelectPriceProduct(Request $request , $id){
        $name = '<p dir="rtl">'.'از'.$request->SelectPriceSlider1.'    تا'.$request->SelectPriceSlider2.'</p>';
        $min=$request->SelectPriceSlider1; //46206160
        $max=$request->SelectPriceSlider2; //190436951
        $products = products::
            orderBy('id' , 'DESC')
            ->where([
                         // $id=15
                        ['Price' , '>=' , $min],
                        ['Price' , '<=' , $max], //250000000
                        ['SubMenu','=' ,$id]
                        ])
            ->get();
        $sizes = Size::orderBy('id', 'DESC')->get();
        $MaxPrice=products::where('SubMenu' , $id)->max('Price');
        $MinPrice=products::where('SubMenu' , $id)->min('Price');
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $idS=$id;
        $Numebrs=0;

        /*        $productsParPage = $products->perPage();
                $productsTotal = $products->total();*/
        return view('Front.ViewSubMenu', compact( 'Numebrs','MaxPrice','MinPrice','name', 'products', 'idS', 'sizes', 'Images', 'Images2'))->with('title', $name);
    }
    public function ViewProductOnePage(products $id){
        $Image=Image::orderBy('id' , 'DESC')->where('products_id' , $id->id)->get();
        $comments=commentss::where('parent_id' , 0)->where('Status' ,  1)->where('id_product' , $id->id)->orderBy('id' , 'DESC')->get();
        $commentsSend=commentss::where('parent_id','!=' , 0)->where('Status' ,  1)->orderBy('id' , 'DESC')->get();
        $sizes = Size::orderBy('id', 'DESC')->where('products_id' , $id->id)->get();
        $attr=attribut::orderBy('id' , 'ASC')->where('id_product' , $id->id)->get();
        return view('Front.ViewProductOne' , compact('commentsSend','sizes','comments','attr','id' , 'Image'));
    }
    public function NewCommentProducts($id , Request $request , commentss $commentss){
        $v=$request->validate([
           'Name' => 'required|max:30|min:2',
           'Text' => 'required|min:10|max:2000',
           'BuyPoduct' => 'required'
        ]);
        $msg='پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما';
        $commentss->id_user=auth()->user()->id;
        $commentss->id_product=$id;
        $commentss->Name=$request->Name;
        $commentss->Text=$request->Text;
        $commentss->Buy=$request->BuyPoduct;

        $commentss->save();

        return back()->with('msg' ,'پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما' );

    }
    public function NewCommentProductsSend(Request $request , $id , commentss $commentss){
        $v=$request->validate([
           'Name' => 'required|max:30|min:5',
           'Text' => 'required|max:2000|min:10'
        ]);
        $commentss->id_user=auth()->user()->id;
        $commentss->id_product=0;
        $commentss->Name=$request->Name;
        $commentss->Text=$request->Text;
        $commentss->parent_id=$id;
        $commentss->Status=0;
        $commentss->Buy=0;

        $commentss->save();

        return back()->with('msg' ,'پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما' );
    }
    public function SaveProductCart($Class , Carts $carts){
        $NumberCheck=$carts->where(['User_id' => auth()->user()->id , 'Product_id' => $Class])->count();
        $Price=products::find($Class)->Price;
        if ($NumberCheck == 0){
            $carts->User_id = auth()->user()->id;
            $carts->Product_id = $Class;
            $carts->Price = $Price;
            $carts->Number = 1;
            $carts->save();
        }else{
            $Number=$carts->where(['User_id' => auth()->user()->id , 'Product_id' => $Class])->get();
            foreach ($Number as $i){
                Carts::where(['User_id' => auth()->user()->id , 'Product_id' => $Class])->update(['Number' => 1+$i->Number]);
            }
        }
        $SumPrice=Carts::get();
        foreach ($SumPrice as $i){
            $Sum=$i->Number * $Price;
            Carts::where('id' , $i->id)->update(['Price' => $Sum]);
        }

        return back()->with('msg' ,'محصول به سبر خرید شما اضافه شده' );
    }
    public function DeleteProductCart(Carts $id){
        $id->delete();
        return back()->with('msg' , 'محصول از سبد خرید شما حذف شد');
    }
    public function BuyProductCart(){
        return 'BUy';
    }
    public function CompletionRegistr(){
        return view('User.CompletionRegistr');
    }
}
