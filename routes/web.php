<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Front.Index');
});

Route::get('/SubMenu/{id}' , [\App\Http\Controllers\IndexController::class,'ViewAllSubMenu'])->name('ViewAllSubMenu');
Route::get('/Select/Item/Sub/Menu' , [\App\Http\Controllers\IndexController::class,'SelectItemSubMenu'])->name('SelectItemSubMenu');
Route::get('/Select/Attr/Menu' , [\App\Http\Controllers\IndexController::class,'SelectAttrMenu'])->name('SelectAttrMenu');
Route::get('/Select/Attr/Menu/Gpu' , [\App\Http\Controllers\IndexController::class,'SelectAttrMenuGpu'])->name('SelectAttrMenuGpu');
Route::get('/Select/Price/Product/{id}' , [\App\Http\Controllers\IndexController::class,'SelectPriceProduct'])->name('SelectPriceProduct');
Route::get('/View/Product/{id}' , [\App\Http\Controllers\IndexController::class,'ViewProductOnePage'])->name('ViewProductOnePage');
Route::post('/New/Comment/Products/{id}' , [\App\Http\Controllers\IndexController::class,'NewCommentProducts'])->name('NewCommentProducts');
Route::post('/New/Comment/Products/Send/{id}' , [\App\Http\Controllers\IndexController::class,'NewCommentProductsSend'])->name('NewCommentProductsSend');
Route::get('/New/Product/Cart/User/{Class}' , [\App\Http\Controllers\IndexController::class,'SaveProductCart'])->name('SaveProductCart');
Route::get('/Delete/Product/Cart/User/{id}' , [\App\Http\Controllers\IndexController::class,'DeleteProductCart'])->name('DeleteProductCart');
Route::get('/Buy/Product/To/Cart' , [\App\Http\Controllers\IndexController::class,'BuyProductCart'])->name('BuyProductCart')->middleware('CompletionRegistr');
Route::get('/CompletionRegistr' , [\App\Http\Controllers\IndexController::class,'CompletionRegistr'])->name('CompletionRegistr');

Route::get('/auth/googel' , [\App\Http\Controllers\GoogleAuthController::class,'ToGoogle'])->name('ToGoogel_Register');
Route::get('/google' , [\App\Http\Controllers\GoogleAuthController::class,'BackGoogle'])->name('BackGoogel_Register');


Route::prefix('admin')->middleware(['auth' , 'Roule'])->group(function (){
    Route::get('/index' , [\App\Http\Controllers\AdminController::class,'index'])->name('index_admin');
    Route::get('/category' , [\App\Http\Controllers\NewCategory::class,'category'])->name('category_admin');
    Route::post('/category/Parents' , [\App\Http\Controllers\NewCategory::class,'parentCategory'])->name('parentCategory_admin');
    Route::post('/category/Child' , [\App\Http\Controllers\NewCategory::class,'ChildCategory'])->name('ChildCategory_admin');
    Route::post('/category/Item/Child/' , [\App\Http\Controllers\NewCategory::class,'ItemChildCategory'])->name('ItemChildCategory_admin');
    Route::get('/category/Parent/Delete/{id}' , [\App\Http\Controllers\NewCategory::class,'ParentDeleteCategory'])->name('ParentDeleteCategory_admin');
    Route::get('/category/Child/Delete/{id}' , [\App\Http\Controllers\NewCategory::class,'ChildDeleteCategory'])->name('ChildDeleteCategory_admin');
    Route::post('/category/Edit/Parent' , [\App\Http\Controllers\NewCategory::class,'EditParentCategory'])->name('EditParentCategory_admin');
    Route::post('/category/Edit/Child' , [\App\Http\Controllers\NewCategory::class,'EditChildCategory'])->name('EditChildCategory_admin');
    Route::post('/category/Edit/Item' , [\App\Http\Controllers\NewCategory::class,'EditItemCategory'])->name('EditItemCategory_admin');
    Route::get('/product/New/Page' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewPage'])->name('ProductNewPage_admin');
    Route::get('/Brand/New/Page' , [\App\Http\Controllers\BrendController::class,'index'])->name('BrandNewPage_admin');
    Route::get('/Brand/View/Page' , [\App\Http\Controllers\BrendController::class,'create'])->name('BrandViewPage_admin');
    Route::get('/Brand/Delete/Page/{id}' , [\App\Http\Controllers\BrendController::class,'destroy'])->name('BrandDeletePage_admin');
    Route::get('/Brand/Edit/Page/{id}' , [\App\Http\Controllers\BrendController::class,'edit'])->name('BrandEditPage_admin');
    Route::post('/Brand/Edit/Index/{id}' , [\App\Http\Controllers\BrendController::class,'update'])->name('BrandEditIndex_admin');
    Route::get('/Brand/Edit/Status/{id}' , [\App\Http\Controllers\BrendController::class,'EditStatus'])->name('BrandEditStatus_admin');
    Route::get('/User/New/Page/' , [\App\Http\Controllers\UserControllerAdmin::class,'index'])->name('UserNewPage_admin');
    Route::post('/User/New/' , [\App\Http\Controllers\UserControllerAdmin::class,'store'])->name('NewUser_admin');
    Route::get('/User/View/All' , [\App\Http\Controllers\UserControllerAdmin::class,'create'])->name('ViewUserAll_admin');
    Route::get('/User/Delete/{user}' , [\App\Http\Controllers\UserControllerAdmin::class,'delete'])->name('UserDelete_admin');
    Route::get('/User/Show/Edit/{user}' , [\App\Http\Controllers\UserControllerAdmin::class,'ShowEdit'])->name('UserShowEdit_admin');
    Route::put('/User/Index/Edit/{user}' , [\App\Http\Controllers\UserControllerAdmin::class,'Update'])->name('UserUpdate_admin');
    Route::get('/User/View/One/{user}' , [\App\Http\Controllers\UserControllerAdmin::class,'show'])->name('UserShowOne_admin');
    Route::get('/Product/View/All' , [\App\Http\Controllers\ProductAdminController::class,'index'])->name('ProductShowAll_admin');
    Route::get('/Product/Delete/{id}' , [\App\Http\Controllers\ProductAdminController::class,'delete'])->name('ProductDelete_admin');
    Route::get('/Product/EditStatus/{id}' , [\App\Http\Controllers\ProductAdminController::class,'EStatus'])->name('ProductEditStatus_admin');
    Route::get('/Product/EditPage/{id}' , [\App\Http\Controllers\ProductAdminController::class,'PageEdit'])->name('ProductPageEdit_admin');
    Route::post('/Product/Index/Edit/{id}' , [\App\Http\Controllers\ProductAdminController::class,'IndexEdit'])->name('ProductIndexEdit_admin');
    Route::get('/Product/View/One/{id}' , [\App\Http\Controllers\ProductAdminController::class,'ViewOne'])->name('ProductViewOne_admin');
    Route::post('/Product/New/Attr/{id}' , [\App\Http\Controllers\ProductAdminController::class,'NewAttr'])->name('ProductNewAttr_admin');
    Route::get('/Product/Delete/Photo/{id}' , [\App\Http\Controllers\ProductAdminController::class,'DeletePhotoOneProduct'])->name('DeletePhotoOneProduct_admin');
    Route::get('/Image/New/All' , [\App\Http\Controllers\ProductAdminController::class,'NewImageSlid'])->name('NewImageSlid_admin');
    Route::get('/TestJoinDB/{id}' , [\App\Http\Controllers\ProductAdminController::class,'TestJoinDB'])->name('TestJoinDB_admin');
    Route::get('/Comments/View' , [\App\Http\Controllers\CommentsViewAdmin::class,'CommentsView'])->name('CommentsView_admin');
    Route::get('/Edit/Comments/One/{id}' , [\App\Http\Controllers\CommentsViewAdmin::class,'EditCommentsOne'])->name('EditCommentsOne_admin');
    Route::get('/Delete/Comments/One/{id}' , [\App\Http\Controllers\CommentsViewAdmin::class,'DeleteCommentsOne'])->name('DeleteCommentsOne_admin');

});
Route::post('/admin/product/New/LE1/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE1'])->middleware(['auth' , 'Roule'])->name('ProductNewLE1_admin');
Route::post('/admin/product/New/LE2/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE2'])->middleware(['auth' , 'Roule'])->name('ProductNewLE2_admin');
Route::post('/admin/product/New/LE3/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE3'])->middleware(['auth' , 'Roule'])->name('ProductNewLE3_admin');
Route::post('/admin/product/New/LE4/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE4'])->middleware(['auth' , 'Roule'])->name('ProductNewLE4_admin');
Route::post('/admin/product/New/LE5/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE5'])->middleware(['auth' , 'Roule'])->name('ProductNewLE5_admin');
Route::post('/admin/product/New/LE6/' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewLE6'])->middleware(['auth' , 'Roule']);
Route::post('/admin/product/New/Photo/One' , [\App\Http\Controllers\ProductAdminController::class,'ProductNewPhotoOne'])->middleware(['auth' , 'Roule']);
Route::post('/admin/Slid/New/Photo' , [\App\Http\Controllers\ProductAdminController::class,'SlidNewPhotoOne'])->middleware(['auth' , 'Roule'])->name('SlidNewPhotoOne_admin');
Route::post('/admin/Ban/New/Photo' , [\App\Http\Controllers\ProductAdminController::class,'BanerNewPhotoOne'])->middleware(['auth' , 'Roule'])->name('BanerNewPhotoOne_admin');
Route::post('/admin/New/Brand' , [\App\Http\Controllers\BrendController::class,'store'])->middleware(['auth' , 'Roule'])->name('NewBrand');
Route::get('/T/D' , function (){return view('welcome');});
Route::get('/TS/D' ,[\App\Http\Controllers\NewCategory::class,'Test']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
