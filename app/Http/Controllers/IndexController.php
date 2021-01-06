<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\attribut;
use App\Models\Carts;
use App\Models\Category;
use App\Models\commentss;
use App\Models\Image;
use App\Models\ItemChild;
use App\Models\orders;
use App\Models\products;
use App\Models\ProductsSend;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
//use Zarinpal\Laravel\Facade\Zarinpal;
use Zarinpal\Zarinpal;

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
        $MaxPrice = products::where('SubMenu', $id->id)->max('Price');
        $MinPrice = products::where('SubMenu', $id->id)->min('Price');
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $productsParPage = $products->perPage();
        $productsTotal = $products->total();
        $Numebrs = 1;
        return view('Front.ViewSubMenu', compact('Numebrs', 'MaxPrice', 'MinPrice', 'productsTotal', 'productsParPage', 'name', 'products', 'idS', 'sizes', 'Images', 'Images2'))->with('title', $name);

    }

    public function SelectItemSubMenu(Request $request)
    {
        $msg = [
            'checkboxItemChild.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v = $request->validate([
            'checkboxItemChild' => 'required'
        ], $msg);
        $id = ItemChild::where('id', $request->checkboxItemChild)->get('Child_id');
        $name = ItemChild::whereIn('id', $request->checkboxItemChild)->get();
        $idS = '';
        foreach ($id as $i) {
            //$Arr=json_encode($i);
            $idS .= $i->Child_id;
        }

        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $products = products::wherein('Category', $request->checkboxItemChild)->get();
        $productsIDStatus = products::wherein('Category', $request->checkboxItemChild)->paginate(1);
        $idP = '';
        foreach ($productsIDStatus as $i) {
            //$Arr=json_encode($i);
            $idP .= $i->Status;
        }
        $Numebrs = 0;
        return view('Front.Menu.ViewSubMenu', compact('Numebrs', 'idP', 'idS', 'products', 'name', 'Images2', 'Images', 'sizes'));
    }

    public function SelectAttrMenu(Request $request)
    {
        $msg = [
            'checkboxAttr.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v = $request->validate([
            'checkboxAttr' => 'required'
        ], $msg);
        $name = $request->checkboxAttr;
        $products = DB::table('attribut as t1')->whereIn('t1.Item', $request->checkboxAttr)
            ->leftJoin('products as t2', 't2.id', 't1.id_product')
            ->select('t2.*', 't1.id_product')
            ->leftJoin('categorys as t3', 't2.SubMenu', '=', 't3.id')
            ->leftJoin('item_children as t4', 't4.id', '=', 't2.Category')
            ->select('t2.*', 't3.NameCategory', 't4.NameItem')
            ->get();
        $id = ItemChild::where('id', $request->checkboxAttr)->get('Child_id');
        $idS = '';
        foreach ($id as $i) {
            //$Arr=json_encode($i);
            $idS .= $i->Child_id;
        }
        $productsIDStatus = products::wherein('Category', $request->checkboxAttr)->paginate(1);
        $idP = '';
        foreach ($productsIDStatus as $i) {
            //$Arr=json_encode($i);
            $idP .= $i->Status;
        }
        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $Numebrs = 0;
        return view('Front.Menu.ViewSubMenu', compact('Numebrs', 'name', 'Images2', 'idP', 'idS', 'products', 'Images', 'sizes'));
    }

    public function SelectAttrMenuGpu(Request $request)
    {
        $msg = [
            'checkboxAttrGpu.required' => 'لطفا ابتدا انتخاب کنید'
        ];
        $v = $request->validate([
            'checkboxAttrGpu' => 'required'
        ], $msg);
        $name = $request->checkboxAttrGpu;
        $products = DB::table('attribut as t1')->whereIn('t1.Item', $request->checkboxAttrGpu)
            ->leftJoin('products as t2', 't2.id', 't1.id_product')
            ->select('t2.*', 't1.id_product')
            ->leftJoin('categorys as t3', 't2.SubMenu', '=', 't3.id')
            ->leftJoin('item_children as t4', 't4.id', '=', 't2.Category')
            ->select('t2.*', 't3.NameCategory', 't4.NameItem')
            ->get();
        $id = ItemChild::where('id', $request->checkboxAttrGpu)->get('Child_id');
        $MinPrice = products::whereIn('Item', $request->checkboxAttr)->min('Price');
        $idS = '';
        foreach ($id as $i) {
            //$Arr=json_encode($i);
            $idS .= $i->Child_id;
        }
        $productsIDStatus = products::wherein('Category', $request->checkboxAttrGpu)->paginate(1);
        $idP = '';
        foreach ($productsIDStatus as $i) {
            //$Arr=json_encode($i);
            $idP .= $i->Status;
        }
        $sizes = Size::orderBy('id', 'DESC')->get();
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $Numebrs = 0;
        return view('Front.Menu.ViewSubMenu', compact('Numebrs', 'MinPrice', 'name', 'Images2', 'idP', 'idS', 'products', 'Images', 'sizes'));
    }

    public function SelectPriceProduct(Request $request, $id)
    {
        $name = '<p dir="rtl">' . 'از' . $request->SelectPriceSlider1 . '    تا' . $request->SelectPriceSlider2 . '</p>';
        $min = $request->SelectPriceSlider1; //46206160
        $max = $request->SelectPriceSlider2; //190436951
        $products = products::
        orderBy('id', 'DESC')
            ->where([
                // $id=15
                ['Price', '>=', $min],
                ['Price', '<=', $max], //250000000
                ['SubMenu', '=', $id]
            ])
            ->get();
        $sizes = Size::orderBy('id', 'DESC')->get();
        $MaxPrice = products::where('SubMenu', $id)->max('Price');
        $MinPrice = products::where('SubMenu', $id)->min('Price');
        $Images = Image::orderBy('id', 'DESC')->get();
        $Images2 = Image::orderBy('id', 'DESC')->get();
        $idS = $id;
        $Numebrs = 0;

        /*        $productsParPage = $products->perPage();
                $productsTotal = $products->total();*/
        return view('Front.ViewSubMenu', compact('Numebrs', 'MaxPrice', 'MinPrice', 'name', 'products', 'idS', 'sizes', 'Images', 'Images2'))->with('title', $name);
    }

    public function ViewProductOnePage(products $id)
    {
        $Image = Image::orderBy('id', 'DESC')->where('products_id', $id->id)->get();
        $comments = commentss::where('parent_id', 0)->where('Status', 1)->where('id_product', $id->id)->orderBy('id', 'DESC')->get();
        $commentsSend = commentss::where('parent_id', '!=', 0)->where('Status', 1)->orderBy('id', 'DESC')->get();
        $sizes = Size::orderBy('id', 'DESC')->where('products_id', $id->id)->get();
        $attr = attribut::orderBy('id', 'ASC')->where('id_product', $id->id)->get();
        return view('Front.ViewProductOne', compact('commentsSend', 'sizes', 'comments', 'attr', 'id', 'Image'));
    }

    public function NewCommentProducts($id, Request $request, commentss $commentss)
    {
        $v = $request->validate([
            'Name' => 'required|max:30|min:2',
            'Text' => 'required|min:10|max:2000',
            'BuyPoduct' => 'required'
        ]);
        $msg = 'پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما';
        $commentss->id_user = auth()->user()->id;
        $commentss->id_product = $id;
        $commentss->Name = $request->Name;
        $commentss->Text = $request->Text;
        $commentss->Buy = $request->BuyPoduct;

        $commentss->save();

        return back()->with('msg', 'پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما');

    }

    public function NewCommentProductsSend(Request $request, $id, commentss $commentss)
    {
        $v = $request->validate([
            'Name' => 'required|max:30|min:5',
            'Text' => 'required|max:2000|min:10'
        ]);
        $commentss->id_user = auth()->user()->id;
        $commentss->id_product = 0;
        $commentss->Name = $request->Name;
        $commentss->Text = $request->Text;
        $commentss->parent_id = $id;
        $commentss->Status = 0;
        $commentss->Buy = 0;

        $commentss->save();

        return back()->with('msg', 'پیام شما ثبت شد . بعد از تایید مدیر انتشار می شود . با تشکر از نظر شما');
    }

    public function SaveProductCart($Class, Carts $carts)
    {
        $NumberCheck = $carts->where(['User_id' => auth()->user()->id, 'Product_id' => $Class])->count();
        $Price = products::find($Class)->Price;
        if ($NumberCheck == 0) {
            $carts->User_id = auth()->user()->id;
            $carts->Product_id = $Class;
            $carts->Price = $Price;
            $carts->Number = 1;
            $carts->save();
        } else {
            $Number = $carts->where(['User_id' => auth()->user()->id, 'Product_id' => $Class])->get();
            foreach ($Number as $i) {
                Carts::where(['User_id' => auth()->user()->id, 'Product_id' => $Class])->update(['Number' => 1 + $i->Number]);
            }
        }
        $SumPrice = Carts::get();
        foreach ($SumPrice as $i) {
            $Sum = $i->Number * $Price;
            Carts::where('id', $i->id)->update(['Price' => $Sum]);
        }

        return back()->with('msg', 'محصول به سبر خرید شما اضافه شده');
    }

    public function DeleteProductCart(Carts $id)
    {
        $id->delete();
        return back()->with('msg', 'محصول از سبد خرید شما حذف شد');
    }

    public function BuyProductCart()
    {
        $CartsUser = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get();
        $Products = products::orderBy('id', 'DESC')->get();
        $TotalPrice = 0;
        foreach ($CartsUser as $i) {
            $TotalPrice += $i->Price;
        }
        return view('Front.StepBuy.StepOne', compact('CartsUser', 'TotalPrice', 'Products'));
    }

    public function SelectAddressBuyStepTow(orders $orders)
    {
        $CartsUser = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get();
        $CartsUserOrders = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get('Product_id');
        $Products = products::orderBy('id', 'DESC')->get();
        $address = address::orderBy('id', 'DESC')->where('id_user', auth()->user()->id)->get();
        $TotalPrice = 0;
        $TotalOrders = '';
        foreach ($CartsUser as $i) {
            $TotalPrice += $i->Price;
        }
        $orders->id_user = auth()->user()->id;
/*        foreach ($CartsUserOrders as $i) {
            $TotalOrders .= $i;
        }*/

        $orders->Orders = $CartsUserOrders;
        $orders->CodeBank = 0;
        $orders->Name = auth()->user()->Name;
        $orders->Email = auth()->user()->email;
        $orders->Mobile = auth()->user()->Mobile;
        $orders->TotalPrice = $TotalPrice;
        $orders->save();
        return view('Front.StepBuy.StepTow', compact('address', 'CartsUser', 'TotalPrice', 'Products'));
    }

    public function CompletionRegistr()
    {
        return view('User.CompletionRegistr');
    }

    public function CompletionProfile(Request $request, User $user)
    {
        $v = $request->validate([
            'CodeMil' => 'required|min:10|max:10',
            'Phone' => 'required',
            'Mobile' => 'required|min:11|max:11',
        ]);
        User::where('id', auth()->user()->id)->update(['CodeMil' => $request->CodeMil, 'Phone' => $request->Phone, 'Mobile' => $request->Phone, 'Sex' => $request->Sex]);
        return redirect(route('BuyProductCart'));
    }

    public function NewAddress(Request $request, address $address)
    {
        $v = $request->validate([
            'Name' => 'required|max:30|min:5',
            'State' => 'required',
            'City' => 'required',
            'Address' => 'required',
            'Phone' => 'required',
            'CodePost' => 'required',
        ]);

        $address->id_user = auth()->user()->id;
        $address->State = $request->State;
        $address->City = $request->City;
        $address->Phone = $request->Phone;
        $address->CodePost = $request->CodePost;
        $address->address = $request->Address;

        $address->save();

        return back()->with('msg', 'ادرس جدید اضافه شد');
    }

    public function StepThreeBuyProducts(Request $request)
    {
        $msg = [
            'SelectAddress.required' => ' یک ادرس را انتخاب کند .'
        ];
        $v = $request->validate([
            'SelectAddress' => 'required',
        ], $msg);
        $CartsUser = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get();
        $Products = products::orderBy('id', 'DESC')->get();
        $TotalPrice = 0;
        $TotalOrders = '';
        foreach ($CartsUser as $i) {
            $TotalPrice += $i->Price;
        }
        $Fid = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->paginate(1);
        $FAid = 0;
        $PriceSend = ProductsSend::where('Status', 1)->orderBy('id', 'DESC')->get();
        $TotalProductsSend = 0;
        foreach ($Fid as $i) {
            $FAid .= $i->id;
        }
        foreach ($PriceSend as $i) {
            $TotalProductsSend += $i->Price;
        }
        $TotalPriceF = $TotalPrice + $TotalProductsSend;
        orders::where(['id' => $FAid, 'id_user' => auth()->user()->id])->update(['Address' => $request->SelectAddress]);
        return view('Front.StepBuy.StepThree', compact('TotalPrice', 'TotalPriceF', 'Products', 'CartsUser', 'TotalProductsSend'));
    }

    public function request()
    {
        $Fid = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->paginate(1);
        $FAid = 0;
        foreach ($Fid as $i) {
            $FAid .= $i->id;
        }
        $CartsUser = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get();
        $TotalPrice = 0;
        $PriceSend = ProductsSend::where('Status', 1)->orderBy('id', 'DESC')->get();
        $TotalProductsSend = 0;
        foreach ($PriceSend as $i) {
            $TotalProductsSend += $i->Price;
        }
        foreach ($CartsUser as $i) {
            $TotalPrice += $i->Price;
        }
        $TotalPriceF = $TotalPrice + $TotalProductsSend;
        $zarinpal = new Zarinpal('24bc65dd-8dc0-4258-a4c2-cbdf8221a13c');
        //$zarinpal->enableSandbox(); // active sandbox mod for test env
        $zarinpal->isZarinGate(); // active zarinGate mode
        $results = $zarinpal->request(
            route('VerifyBank'),          //required
            $TotalPriceF,                                  //required
            'testing',                             //required
            'sina1010@gmail.com',                      //optional
            '09395231890'                         //optional
        );
        echo json_encode($results);
        if (isset($results['Authority'])) {
            file_put_contents('Authority', $results['Authority']);
            orders::where(['id' => $FAid, 'id_user' => auth()->user()->id])->update(['CodeBank' => $results['Authority']]);
            $zarinpal->redirect();
        }
    }
    public function VerifyBank(){
        $Fid = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->paginate(1);
        $FAid = 0;
        foreach ($Fid as $i) {
            $FAid .= $i->id;
        }
        $products = products::orderBy('id', 'DESC')->get();
        $CartsUser = Carts::orderBy('id', 'DESC')->where(['Status' => 0, 'User_id' => auth()->user()->id])->get();
        $Orders =DB::table('orders')
            ->orderBy('id', 'DESC')
            ->where(['Status' => 0, 'id_user' => auth()->user()->id])
            ->paginate(1);
/*        foreach ($Orders as $i) {
            $NameProdcuts = $i->Orders;
            $arr = json_decode($NameProdcuts, true);
            foreach ($arr as $ii) {
                echo $ii['Product_id'].'<br>';
            }
        }*/
        //print_r($NameProdcuts);
        $TotalPrice = 0;
        $PriceSend = ProductsSend::where('Status', 1)->orderBy('id', 'DESC')->get();
        $TotalProductsSend = 0;
        foreach ($PriceSend as $i) {
            $TotalProductsSend += $i->Price;
        }
        foreach ($CartsUser as $i) {
            $TotalPrice += $i->Price;
        }
        $TotalPriceF = $TotalPrice + $TotalProductsSend;
        $zarinpal = new Zarinpal('24bc65dd-8dc0-4258-a4c2-cbdf8221a13c');
        $authority = file_get_contents('Authority');
        //echo json_encode($zarinpal->verify('OK', $TotalPriceF, $authority));
        if (isset($_GET['Status']) && $_GET['Status'] == 'OK') {
            $Fid = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->paginate(1);
            $FAid = 0;
            foreach ($Fid as $i) {
                $FAid .= $i->id;
            }
            orders::where(['id' => $FAid, 'id_user' => auth()->user()->id])->update(['Status' =>200]);
            return view('Front.StepBuy.SendBank.OK_Buy' , compact('Orders' , 'products'));
        }else{
            $Fid = orders::where('id_user', auth()->user()->id)->orderBy('id', 'DESC')->paginate(1);
            $FAid = 0;
            foreach ($Fid as $i) {
                $FAid .= $i->id;
            }
            orders::where(['id' => $FAid, 'id_user' => auth()->user()->id])->update(['Status' =>404]);
            return view('Front.StepBuy.SendBank.NO_Buy', compact('Orders' , 'products'));

        }
    }
    public function SearchProducts(Request $request){
        if ($request->name != ''){
            $BoxSearch='';
            $products=products::where('Name' , 'LIKE' , '%'.$request->name.'%')->get();
            foreach ($products as $i){
                $BoxSearch.='<a href="'.route('ViewProductOnePage' , $i->Name).'">'.$i->Name.'</a>'.'<br><br><br>';
            }
            return $BoxSearch;
        }


    }
}
