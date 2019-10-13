<?php

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



Auth::routes();
Route::get('/hashMake',function(){
	return Hash::make('12101997');
});
//route of search

Route::get('/search','Home\Search@index')->name('home.search');

//route of vote method
Route::get('/vote/{id}','Comment@show')->name('home.vote');
Route::post('vote/submit', ['uses' => 'Comment@submit', 'as' => 'home.vote.submit']);
Route::get('/vote/list/{id}',['uses' => 'Comment@list','as' => 'home.vote.list']);
Route::get('/vote/total/{id}',['uses' => 'Comment@total','as' => 'home.vote.total']);

//end vote
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/', 'Home\HomeController@index')->name('home');
Route::get('/home','Home\HomeController@index');
Route::get('/categorys/{id?}','Home\Categorys@index')->name('home.categorys');
Route::get('/vendors/{id?}','Home\Vendors@index')->name('home.vendors');


Route::get('/product/{name}-{id}.html', "Home\ProductDetail@index")->name('home.product.detail');
Route::get('/vendor/{name}-{id}.html', function($name, $id){})->name('home.vendor.detail');
Route::get('/cart','User\CartController@index')->name('user.cart');
Route::post('/order','User\OrderController@index')->name('user.order');
Route::post('/add-to-cart',['uses'=>'User\OrderController@add'])->name('user.cart.add');
Route::patch('/pay',['uses' => 'User\PayController@index'])->name('user.pay');
Route::get('/pay',['uses' => 'User\PayController@index'])->name('user.pay.get');
Route::post('/pay',['uses' => 'User\PayController@submit'])->name('user.pay.submit');
//receiver: nguoi nhan
Route::prefix('/receiver')->group(function(){
	Route::post('/',['uses'=>'User\ReceiverController@index'])->name('user.receiver');
	Route::post('/add',['uses'=>'User\ReceiverController@add'])->name('user.receiver.add');
});
//set api
Route::prefix('/graph')->group(function(){
	Route::get('/apiComfirm','core\CategorysController@api');

	Route::get('/helper','core\GraphController@index');

	Route::post('/login','Auth\LoginController@_loginSubmit')->name('graph.login');

	Route::prefix('/category')->group(function(){
		Route::get('/','core\CategorysController@get')->name('category.get');
		Route::get('/all','core\CategorysController@all')->name('category.all');
		Route::get('/paginate','core\CategorysController@paginate')->name('category.paginate');
		Route::get('/products','core\CategorysController@products')->name('category.products');
		Route::post('/insert','core\CategorysController@insertGraph')->name('category.insert');
		Route::post('/delete','core\CategorysController@delete')->name('category.delete');
		Route::post('/update','core\CategorysController@update')->name('category.update');
	});

	Route::prefix('/vendor')->group(function(){
		Route::get('/','core\VendorsController@get')->name('vendor.get');
		Route::get('/all','core\VendorsController@all')->name('vendor.all');
		Route::get('/paginate','core\VendorsController@paginate')->name('vendor.paginate');
		Route::get('/products','core\VendorsController@products')->name('vendor.products');
		Route::post('/insert','core\VendorsController@insert')->name('vendor.insert');
		Route::post('/delete','core\VendorsController@delete')->name('vendor.delete');
		Route::post('/update','core\VendorsController@update')->name('vendor.update');
	});

	Route::prefix('/product')->group(function(){
		Route::get('/','core\ProductsController@get')->name('product.get');
		Route::get('/all','core\ProductsController@all')->name('product.all');
		Route::get('/paginate','core\ProductsController@paginate')->name('product.paginate');
		Route::post('/insert','core\ProductsController@insertGraph')->name('product.insert');
		Route::post('/update','core\ProductsController@update')->name('product.update');
		Route::post('/delete','core\ProductsController@delete')->name('product.delete');
		Route::post('/delete-group','core\ProductsController@deleteGroup')->name('product.delete.group');
	});

	Route::prefix('/user')->group(function(){
		Route::get('/','core\UsersController@get')->name('user.get');
		Route::post('/update','core\UsersController@update')->name('user.update');
		Route::post('/register','core\UsersController@register')->name('user.register');
		Route::get('/list','core\UsersController@listUser')->name('user.list');
	});

	Route::prefix('/vote')->group(function(){
		Route::get('/','Comment@get')->name('vote.get');
		Route::get('/user','Comment@getFromUserId')->name('vote.get.user');
	});

	Route::prefix('/order')->group(function(){
		Route::get('/user/{userId}','core\OrdersController@findFromUserIdOrFail')->name('order.get');
	});
});
//group admin controller
Route::prefix('/admin')->group(function(){
	Route::get('/','Admin\DashboardController@index');
	Route::get('/dashboard',['as' => 'admin.dashboard','uses' => 'Admin\DashboardController@index']);
	//set route for product controller
	Route::get('/products',['as' => 'admin.products','uses' => 'Admin\Product\ProductsController@index']);
	Route::prefix('/product')->group(function(){
		Route::get('/add',['as' => 'admin.product.add','uses' => 'Admin\Product\AddProductController@index']);
		Route::post('/add',['as' => 'admin.product.add.submit', 'uses' => 'Admin\Product\AddProductController@submit']);
		Route::get('/edit/{id}.html',['as' => 'admin.product.edit','uses' => 'Admin\Product\EditProductController@index']);
		Route::post('/edit/submit',['as' => 'admin.product.edit.submit','uses' => 'Admin\Product\EditProductController@submit']);
	});
	//set route for category controller
	Route::prefix('/categorys')->group(function(){
		Route::get('/',['as' => 'admin.categorys','uses' => 'Admin\Category\CategorysController@index']);
		Route::post('/add',['as' => 'admin.categorys.add.submit',' uses' => 'Admin\Category\AddCategoryController@submit']);
	});
	Route::prefix('/category')->group(function(){
		Route::get('statistical',['as' => 'admin.category.statistical','uses' => 'Admin\Category\CategorysController@statistical']);
		Route::get('/edit/{id}.html',['as' => 'admin.category.edit','uses' => 'Admin\Category\EditCategoryController@index']);
		Route::post('/edit/submit',['as' => 'admin.category.edit.submit','uses' => 'Admin\Category\EditCategoryController@submit']);
		Route::get('/add',['as' => 'admin.category.add', 'uses' => 'Admin\Category\AddCategoryController@index']);
		Route::post('/add',['as' => 'admin.category.add.submit', 'uses' => 'Admin\Category\AddCategoryController@submit']);
	});
	//set route for vendor controller
	Route::get('/vendors', ['as' => 'admin.vendors','uses' => 'Admin\Vendor\VendorsController@index']);
	Route::prefix('/vendor')->group(function(){
		Route::get('statistical',['as' => 'admin.vendor.statistical','uses' => 'Admin\Vendor\VendorsController@statistical']);
		Route::get('/edit/{id}.html',['as' => 'admin.vendor.edit','uses' => 'Admin\Vendor\EditVendorController@index']);
		Route::post('/edit/submit',['as' => 'admin.vendor.edit.submit','uses' => 'Admin\Vendor\EditVendorController@submit']);
		Route::get('/add',['as' => 'admin.vendor.add', 'uses' => 'Admin\Vendor\AddVendorController@index']);
		Route::post('/add',['as' => 'admin.vendor.add.submit', 'uses' => 'Admin\Vendor\AddVendorController@submit']);
	});
	Route::prefix('shop')->group(function(){
		Route::get('/',['as' => 'admin.shop','uses' => 'Admin\ShopController@index']);
		Route::get('/facebook',['as' => 'admin.shop.facebook', 'uses' => 'Admin\ShopController@facebook']);
		Route::get('/design',['as' => 'admin.shop.design','uses' => 'Admin\ShopController@design']);
		Route::get('/design-update',['as' => 'admin.shop.design.update','uses' => 'Admin\ShopController@designUpdate']);
		Route::post('/add-menu-item',['as' => 'admin.add.menu.item','uses' => 'Admin\EditMenuController@menuItemAdd']);
		Route::get('/delete-menu-item',['as' => 'admin.delete.menu.item','uses'=>'Admin\EditMenuController@menuItemDelete']);
		Route::post('/add-menu',['as' => 'admin.add.menu','uses' => 'Admin\EditMenuController@menuAdd']);
		Route::post('/edit-menu',['as' => 'admin.edit.menu','uses' => 'Admin\EditMenuController@menuEdit']);
	});
	Route::prefix('/search')->group(function(){
		Route::get('/',['as' => 'admin.search.submit','uses' => 'Admin\SearchController@index']);
		Route::get('/load',['as' => 'admin.search.load', 'uses' => 'Admin\SearchController@load']);
	});

	//auth
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
//	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});
