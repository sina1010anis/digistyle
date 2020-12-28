<?php

namespace App\Http\Controllers;

use App\Models\attribut;
use App\Models\Baner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\ItemChild;
use App\Models\Parenta;
use App\Models\products;
use App\Models\Size;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{
    public function ProductNewPage()
    {
        $Items=ItemChild::orderBy('id' , 'DESC')->get();
        $Brands=Brand::orderBy('id' , 'DESC')->get();
        $Category=Category::orderBy('id' , 'DESC')->get();
        $Parent=Parenta::orderBy('id' , 'DESC')->get();
        $title = 'محصول جدید';
        return view('Admin.NewProduct', compact('Parent','title' , 'Items' , 'Brands' , 'Category'));
    }

    public function ProductNewLE1(Request $request , products $products)
    {
        if ($request->Name == '') {
            echo '00-1';
        }
        if ($request->price == '') {
            echo '00-2';
        }
        if ($request->DE == '') {
            echo '00-3';
        } else {
            $new = new products([
                'Name' => $request->Name,
                'price' => $request->price,
                'DE' => $request->DE,
                'Country' => $request->Brand,
                'Status' => 0,
            ]);
            $new->save();
            echo 'ok';
        }

    }
    public function ProductNewLE2(Request $request ,products $products){
        $product=products::orderBy('id' , 'DESC')->get();
        foreach ($product as $i){
            $arr=json_encode($product );
            $array=json_decode($arr , true);
            $data=$array[0];
        }
        $id=$data['id'];
        products::orderBy('id' , 'DESC')->where('id' , $id)->update(['Category' => $request->Item , 'SubMenu' => $request->SubMenu , 'Status' => $request->Parent]);
    }
    public function ProductNewLE3(Request $request ,products $products){
        $product=products::orderBy('id' , 'DESC')->get();
        foreach ($product as $i){
            $arr=json_encode($product );
            $array=json_decode($arr , true);
            $data=$array[0];
        }
        $id=$data['id'];
    }
    public function ProductNewLE4(Request $request ,products $products){
        if ($request->ajax()) {
            $product=products::orderBy('id' , 'DESC')->get();
            foreach ($product as $i){
                $arr=json_encode($product );
                $array=json_decode($arr , true);
                $data=$array[0];
            }
            $id=$data['id'];
            $tmp=$request->file('Photo');
            $name=microtime(true).$tmp->getClientOriginalName();
            $tmp->move(public_path('/Data_User/Image/') , $name);
            products::orderBy('id' , 'DESC')->where('id' , $id)->update(['Image' => $name]);
            echo 'ok';
        }

    }
    public function ProductNewLE5(Request $request ,products $products , attribut $attribut){
        if ($request->ajax()) {
            $product=products::orderBy('id' , 'DESC')->get();
            foreach ($product as $i){
                $arr=json_encode($product );
                $array=json_decode($arr , true);
                $data=$array[0];
            }
            $id=$data['id'];
            $v=$request->validate([
                'Name_K' => 'required',
                'Item_K' => 'required',
            ]);
            $new= new attribut([
                'id_product' => $id,
                'Name' => $request->Name_K,
                'Item' => $request->Item_K,
            ]);
            $new->save();
            echo 'ok';
        }

    }
    public function ProductNewLE6(Request $request ,products $products , attribut $attribut){
        if ($request->ajax()) {
            $product=products::orderBy('id' , 'DESC')->get();
            foreach ($product as $i){
                $arr=json_encode($product );
                $array=json_decode($arr , true);
                $data=$array[0];
            }
            $id=$data['id'];
            $v=$request->validate([
                'Size' => 'required',
            ]);
            $new= new Size([
                'products_id' => $id,
                'Size' => $request->Size,
            ]);
            $new->save();
            echo 'ok';
        }

    }
    public function index(){
        $title='مشاهده محصولات ';
        $DataP=products::orderBy('id' , 'DESC')->paginate(5);
        return view('Admin.Product.index' , compact('title' , 'DataP'));
    }
    public function delete(products $id){
        $id->delete();
        return redirect(route('ProductShowAll_admin'))->with('msg' , 'مقدار با موفقیت حذف شد');
    }
    public function EStatus(products $id){
        if ($id->Status == 1) {
            products::where('id' , $id->id)->update(['Status' => 2]);
        }elseif ($id->Status == 2){
            products::where('id' , $id->id)->update(['Status' => 1]);
        }
        return redirect(route('ProductShowAll_admin'))->with('msg' ,'وضعیت محصول مورد نظر نغییر کرد');
    }
    public function PageEdit(products $id){
        $title=' ویرایش  '.$id->Name;
        $Category=ItemChild::where('id' , $id->Category)->get();
        $CategoryAll=ItemChild::get();
        return view('Admin.Product.Edit' , compact('title' , 'id' , 'Category','CategoryAll'));
    }
    public function IndexEdit(products $id ,Request $request){
        $v=$request->validate([
            'Name' => 'required',
            'Price' => 'required',
            'DE' => 'required',
        ]);
        $id->Name = $request->Name;
        $id->Price = $request->Price;
        $id->DE = $request->DE;
        $id->Category = $request->Category;

        $id->save();
        return redirect(route('ProductShowAll_admin'))->with('msg' ,'محصول مورد نظر ویرایش شد');
    }
    public function ViewOne(products $id){
        $title=' مشخصات محصول '.$id->Name;
        $Category=ItemChild::where('id' , $id->Category)->get();
        $attr=attribut::where('id_product' , $id->id)->get();
        $img=Image::where('products_id' , $id->id)->get();
        return view('Admin.Product.ViewOne' , compact('id' , 'title' , 'Category' , 'attr' , 'img'));
    }
    public function NewAttr($id , Request $request){
        $v=$request->validate([
           'Name' =>'required' ,
           'Item' =>'required'
        ]);
        $new = new attribut([
            'Name' => $request->Name,
            'Item' => $request->Item,
            'id_product' => $id,
        ]);
        $new->save();
        return back()->with('msg' , 'خصوصه جدید اضافه شد');
    }
    public function ProductNewPhotoOne(Request $request , Image $image){
        if ($request->ajax()) {
            $tmp=$request->file('Image');
            $Name=microtime(true).$tmp->getClientOriginalName();
            $tmp->move(public_path('/Data_User/Image/Product/'),$Name);

            $new = new Image([
                'products_id' => $request->id,
                'image' => $Name,

            ]);
            $new->save();
            echo 'ok';
        }
    }
    public function NewImageSlid(){
        $products=products::orderBy('id' , 'DESC')->get();
        $brands=Brand::orderBy('id' , 'DESC')->get();
        return view('Admin.NewImage' , compact('products' , 'brands'))->with('title' , 'ایجاد عکس جدید');
    }
    public function SlidNewPhotoOne(Request $request , slider $slider){
        if ($request->ajax()) {
            $tmp=$request->file('Image');
            $NameImage=microtime(true).$tmp->getClientOriginalName();
            $tmp->move(public_path('/Data_User/Image/Slider/') , $NameImage);
            $slider->Name=$request->Name;
            $slider->id_product=$request->id_product;
            $slider->berand	=$request->berand;
            $slider->Image=$NameImage;

            $slider->save();
        }
    }
    public function BanerNewPhotoOne(Request $request , Baner $baner){
        if ($request->ajax()) {
            $tmp=$request->file('ImageB');
            $NameImage=microtime(true).$tmp->getClientOriginalName();
            $tmp->move(public_path('/Data_User/Image/Baner/') , $NameImage);
            $baner->Name=$request->Name;
            $baner->Image=$NameImage;
            $baner->id_brand=$request->id_brand;
            $baner->save();
        }
    }
    public function TestJoinDB(Request $request){
        $id=$request->id;
        $product=DB::table('products as t1')->where('t1.id' , $id)->leftJoin("sizes As t2" , "t1.id" , "=" , "t2.products_id")->select("t1.Name" , "t2.size")->get();


        return $product;
    }
    public function DeletePhotoOneProduct(Image $id){
        $id->delete();
        return back()->with('msg' , 'عکس مورد نظر حذف شد');
    }
}
