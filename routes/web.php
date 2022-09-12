<?php

use App\Models\Reservation;
use App\Models\Sessions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');


Route::get('test',function(){
    $res =Reservation::get();



    foreach($res as $r){

        $carbon = Carbon::parse($r->start_date);
        $carbon_end = Carbon::parse($r->end_date);

        $carbon_now = Carbon::parse(now());

        $start_date = $carbon->format('Y-m-d H:i');

        $end_date = $carbon_end->format('Y-m-d H:i');

        $start_now = $carbon_now->format('Y-m-d H:i');

        if($start_now < $start_date ){

            $r->update([
                'status' => 'pending',
            ]);
        }

        if($start_now >= $start_date and $start_now < $end_date ){

            $r->update([
                'status' => 'underway',
            ]);
        }


    }

});
