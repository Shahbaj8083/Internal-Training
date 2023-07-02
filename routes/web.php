<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Models\employee;
use App\Http\Controllers\formController;
use App\Http\Controllers\dateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    //     return view('welcome');
//     // echo "hello";
// });

// Route::get('/form',function(){
    //     return view('demo');
    // });
    
    // Route::get('/demo/{param}/{id?}',function($arg,$id=null){
        //     // echo $arg;
        //     // echo $id;
        //     $arrData = compact('arg','id');
//     return view('demo')->with($arrData);
// });
// Route::any('/test',function(){
    //     echo "This is testing";
    // }); 
    
    // Route::get('/{name?}',function($name=null){
        //     $data = compact('name');
        //     return view('home')->with($data);
        // });
        
        // Route::get('/',function(){
            //     return view('homepage');
            
// });  

// Route::get('/about',function(){
//     return view('about');
// });

//  Route::resource('user', UserController::class);

// Route::get('/',[DemoController::class,'index']);
// // Route::get('/about',[DemoController::class,'about']);
// // Route::get('/about','App\Http\Controllers\DemoController::about');not working
// Route::get('/about',SingleActionController::class);

// Route::resource('/photo',PhotoController::class);

// Route::get('/register',[DemoController::class,'index']);
// Route::post('/register',[DemoController::class,'register']);

// Route::get('/employee',function(){
//     $all_employees = employee::all();
//     echo "<pre>";
//     print_r($all_employees->toArray());
// });
Route::get('/home', [dateController::class, 'index']);

Route::get('/myform',[formController::class,'index']);
Route::post('/myform',[formController::class,'store']);
Route::get('/myform/delete/{id}',[formController::class,'delete']);
Route::get('/myform/edit/{id}',[formController::class,'edit']);   
Route::post('/myform/update/{id}',[formController::class,'update']);  
Route::get('/myform/view-employee',[formController::class,'view']);
Route::any('/myform/update/{id}',[formController::class,'update']);

Route::post('/myform', 'formController@store')->middleware('validate');


   