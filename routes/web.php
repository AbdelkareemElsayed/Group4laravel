<?php

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

Route::get('Message',function (){

    echo 'Welcome to laravel';
});


// Route::get('Student',function (){
//     return view('student');
// });


Route::view('Profile', 'student');


Route::view('SignUp', 'Register');

Route::post('Create',function (){
    echo 'Your data sended';
});




// Route::any('Student',function (){
//     return view('student');
// });


Route::match(['post','get'],'Student',function (){
    return view('student');
});






Route::get('User/{id?}',function ($var = null){

    echo 'User Id = '.$var;
})->where('id','[0-9]+');





/*
 get 
 post 
 put
 delete
 patch 
 any 
 match 
 option 
*/ 
