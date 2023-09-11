<?php

use App\Models\SemuaPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabController;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SidebarController;

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


Route::get('/dashboard', function(){
    $jumlahpesanan = SemuaPesanan::count();
    $pesananbaru = SemuaPesanan::where('status_id', '5')->count();
    $siapdikirim = SemuaPesanan::where('status_id', '6')->count();
    $dalampengiriman = SemuaPesanan::where('status_id', '7')->count();
    $pesanandicustomer = SemuaPesanan::where('status_id', '8')->count();
    $dibatalkan = SemuaPesanan::where('status_id', '9')->count();

    return view('dashboard', compact('jumlahpesanan', 'pesananbaru', 'siapdikirim', 'dalampengiriman', 'pesanandicustomer', 'dibatalkan'));
})->middleware('auth');
Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::get('/main', [TabController::class, 'index'])->middleware('auth');
Route::get('/main2', [TabController::class, 'index2'])->middleware('auth');
Route::get('/main3', [TabController::class, 'index3'])->middleware('auth');
Route::get('/main4', [TabController::class, 'index4'])->middleware('auth');
Route::get('/main5', [TabController::class, 'index5'])->middleware('auth');
Route::get('/main6', [TabController::class, 'index6'])->middleware('auth');

Route::get('/viewEmails', [SidebarController::class, 'indexManageEmails'])->middleware('auth');
Route::get('read/datatable/manageemails', [SidebarController::class, 'showManageEmails']);
Route::get('/createemail', [SidebarController::class, 'createEmail'])->middleware('auth');
Route::post('/createemail', [SidebarController::class, 'storeEmail'])->middleware('auth');
Route::post('/deleteemail', [SidebarController::class, 'deleteEmail']);

Route::get('/viewListAdmin', [SidebarController::class, 'indexManageAdmin'])->middleware('auth');
Route::get('read/datatable/manageadmin', [SidebarController::class, 'showManageAdmin']);
Route::get('/createadmin', [SidebarController::class, 'createAdmin'])->middleware('auth');
Route::post('/createadmin', [SidebarController::class, 'storeAdmin'])->middleware('auth');
Route::post('/deleteadmin', [SidebarController::class, 'deleteAdmin']);

Route::get('/viewListMember', [SidebarController::class, 'indexManageMember'])->middleware('auth');
Route::get('read/datatable/managemember', [SidebarController::class, 'showManagemember']);
Route::get('/editaddressmember/{id}', [SidebarController::class, 'editaddress']);
Route::post('/updateaddressmember/{id}', [SidebarController::class, 'updateaddressmember'])->name('updateaddressmember');
Route::get('province_id', [SidebarController::class, 'province']);
Route::post('api/fetch-city', [SidebarController::class, 'city']);
Route::post('api/fetch-district', [SidebarController::class, 'district']);
Route::post('api/fetch-subdistrict', [SidebarController::class, 'sub_district']);

Route::get('/monitoringjob', [SidebarController::class, 'indexMonitoringJob'])->middleware('auth');
Route::get('read/datatable/monitoringjob', [SidebarController::class, 'showMonitoringJob']);

Route::get('/viewListOngkir', [SidebarController::class, 'indexManageOngkir'])->middleware('auth');
Route::get('read/datatable/manageongkir', [SidebarController::class, 'showManageOngkir']);
Route::get('/createongkir', [SidebarController::class, 'createOngkir'])->middleware('auth');
Route::post('/createongkir', [SidebarController::class, 'storeOngkir'])->middleware('auth');
Route::post('/deleteongkir', [SidebarController::class, 'deleteOngkir']);
Route::get('/editongkir/{id}', [SidebarController::class, 'editongkir']);
Route::post('/updateongkir/{id}', [SidebarController::class, 'updateongkir'])->name('updateongkir');


Route::get('/createkendaraan', [SidebarController::class, 'createKendaraan'])->middleware('auth');
Route::post('/createkendaraan', [SidebarController::class, 'storeKendaraan'])->middleware('auth');
Route::get('read/kendaraan', [SidebarController::class, 'tablekendaraan']);
Route::get('/editkendaraan/{id}', [SidebarController::class, 'editkendaraan']);
Route::post('/update/{id}', [SidebarController::class, 'updatekendaraan'])->name('updatekendaraan');


Route::get('/viewListFreeOngkir', [SidebarController::class, 'indexFreeOngkir'])->middleware('auth');
Route::get('read/datatable/freeongkir', [SidebarController::class, 'showFreeOngkir']);
Route::get('read/modalmember/{id}',[SidebarController::class,'detailsmember']);
Route::get('/editfreeongkir/{id}', [SidebarController::class, 'editfreeongkir']);
Route::post('/updatefreeongkir/{id}', [SidebarController::class, 'updatefreeongkir'])->name('updatefreeongkir');

Route::get('/viewDistance', [SidebarController::class, 'indexManageDistance'])->middleware('auth');
Route::get('read/datatable/managedistance', [SidebarController::class, 'showManageDistance']);
Route::get('/editdistance/{id}', [SidebarController::class, 'editdistance']);
Route::post('/updateaddressmember2/{id}', [SidebarController::class, 'updatedistance'])->name('updateaddressmember2');

Route::get('read/datatable',[TabController::class,'tableread']);
Route::get('read/nworder',[TabController::class,'tableneworder']);
Route::get('read/spkirim',[TabController::class,'tablesiapkirim']);
Route::get('read/krm',[TabController::class,'tablekirim']);
Route::get('read/trm',[TabController::class,'tabletrm']);
Route::get('read/btl',[TabController::class,'tablebtl']);
Route::get('read/modal/{kode_transaksi}',[TabController::class,'details']);
Route::get('read/modal2/{kode_transaksi}',[TabController::class,'details2']);
Route::get('read/modal3/{kode_transaksi}',[TabController::class,'details3']);
Route::get('/timelinetransaksi/{kode_transaksi}', [TabController::class, 'timeline']);
Route::post('data.update', [TabController::class, 'update'])->name('update');
Route::post('data.send', [TabController::class, 'proseskirim'])->name('send');



