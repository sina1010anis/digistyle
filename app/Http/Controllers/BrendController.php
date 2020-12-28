<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'ایجاد برد جدید';
        return view('Admin.NewBrand', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'نمایش برند ها';
        $DatasBrand = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('Admin.Brand.index', compact('title', 'DatasBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $tmp = $request->file('Image');
            $NameImage = microtime(true) . $tmp->getClientOriginalName();
            $tmp->move(public_path('/Data_User/image/brand'), $NameImage);
            $new = new Brand([
                'Name' => $request->Name,
                'Country' => $request->Country,
                'Image' => $NameImage,
            ]);
            $new->save();
            echo 'ok';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DataF = Brand::where('id', $id)->get();
        $Name ='' ;
        $Country ='' ;
        $Id ='' ;
        foreach ($DataF as $i) {
            $Name.=$i->Name;
            $Country.=$i->Country;
            $Id.=$i->id;
        }
        $DataA=array('Name' => $Name , 'Country' => $Country , 'Id' => $Id);
        $title = '  ویرایش برند '. $Name ;
        return view('Admin.Brand.Edit', compact('title' , 'DataA'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v=$request->validate([
            'NameEdit' => 'required|min:2|max:30',
            'CountryEdit' => 'required|min:2|max:30'
        ]);
         Brand::where('id' , $id)->update(['Name' => $request->NameEdit , 'Country' => $request->CountryEdit]);
        return redirect(route('BrandViewPage_admin'))->with('msg', 'تغییرات شما اضافه شده');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        Brand::where('id', $id)->delete();
        return redirect(route('BrandViewPage_admin'))->with('msg', 'مقدار با موفقیت حذف شد');
    }
    public function EditStatus($id){
        $DataF = Brand::where('id', $id)->get();
        $Id ='' ;
        $Status ='' ;
        foreach ($DataF as $i) {
            $Id.=$i->id;
            $Status.=$i->Status;
        }
        if ($Status == 1) {
            Brand::where('id', $id)->update(['Status' => '0']);
        }else{
            Brand::where('id', $id)->update(['Status' => '1']);
        }
        return redirect(route('BrandViewPage_admin'))->with('msg', 'مقدار ویرایش شد');
    }
}
