<?php

namespace App\Providers;

use App\Models\attribut;
use App\Models\Baner;
use App\Models\Brand;
use App\Models\Carts;
use App\Models\Category;
use App\Models\ItemChild;
use App\Models\Off;
use App\Models\Parenta;
use App\Models\products;
use App\Models\slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $ItemParentMenuIndex=Parenta::orderBy('id' , 'DESC')->get();
        View::share('ItemParentMenuIndex' , $ItemParentMenuIndex);

        $ItemChildMenuIndex=Category::orderBy('id' , 'DESC')->get();
        View::share('ItemChildMenuIndex' , $ItemChildMenuIndex);

        $ItemItemMenuIndex=ItemChild::orderBy('id' , 'DESC')->get();
        View::share('ItemItemMenuIndex' , $ItemItemMenuIndex);

        $PhotoSliderAll=slider::orderBy('id' , 'DESC')->where('Status' , '1')->get();
        View::share('PhotoSliderAll' , $PhotoSliderAll);

        $PhotoBanerAll=Baner::orderBy('id' , 'DESC')->paginate(3);
        View::share('PhotoBanerAll' , $PhotoBanerAll);

        $ProductAll=products::orderBy('id' , 'DESC')->get();
        View::share('ProductAll' , $ProductAll);

        $Date=jdate()->format('%d-%m-%Y');
        $ProductOff=Off::where('StartDate' , '<=' , $Date)->where('EndDate' , '>=' , $Date)->get();
        View::share('ProductOff' , $ProductOff);

        $AllBrand=Brand::orderBy('id'  , 'DESC')->get();
        View::share('AllBrand' , $AllBrand);

        $ItemSubMenu=ItemChild::orderBy('id'  , 'DESC')->get();
        View::share('ItemSubMenu' , $ItemSubMenu);

        $AttrProductSubMenuCpu=attribut::orderBy('id'  , 'DESC')->where('Name' , 'CPU')->get();
        View::share('AttrProductSubMenuCpu' , $AttrProductSubMenuCpu);

        $AttrProductSubMenuGpu=attribut::orderBy('id'  , 'DESC')->where('Name' , 'GPU')->get();
        View::share('AttrProductSubMenuGpu' , $AttrProductSubMenuGpu);

        $ItemSubMenuGifCart=attribut::orderBy('id'  , 'DESC')->where('Name' , 'Time')->get();
        View::share('ItemSubMenuGifCart' , $ItemSubMenuGifCart);

        $ItemSubMenuProductMan=attribut::orderBy('id'  , 'DESC')->where('id' , 17)->get();
        View::share('ItemSubMenuProductMan' , $ItemSubMenuProductMan);

        $ItemSubMenuProductSport=attribut::orderBy('id'  , 'DESC')->where('id' , 18)->get();
        View::share('ItemSubMenuProductSport' , $ItemSubMenuProductSport);

        $ViewAllCartsUser=Carts::orderBy('id'  , 'DESC')->get();
        View::share('ViewAllCartsUser' , $ViewAllCartsUser);

        $CountViewAllCartsUser=Carts::orderBy('id'  , 'DESC')->get();
        View::share('CountViewAllCartsUser' , $CountViewAllCartsUser);
    }
}
