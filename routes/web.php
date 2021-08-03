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

// Route::get('Message',function (){

//     echo 'Welcome to laravel';
// });


// Route::get('Student',function (){
//     return view('student');
// });


 Route::get('Message','testController@Message');
 Route::get('Profile','testController@GetProfile');


 Route::get('display','testController@displayStudents');
 Route::get('Register','testcontroller@register');
 Route::post('StoreStudent','testcontroller@Store');
 Route::get('deleteStudent/{id}','testController@deleteStudent');
 Route::get('edit/{id}','testController@showData');
 Route::post('update','testController@edit');


 Route::resource('Users','userController');

 Route::get('Login','userController@loginView');

 Route::post('doLogin','userController@login');

 Route::get('LogOut','userController@logout');

 /*
    Users        (get)          Route::get('Users','userController@index'); 
    Users/create (get)          Route::get('Users/create','userController@create'); 
    Users        (post)         Route::post('Users','userController@store'); 
    Users/{id}/edit (get)       Route::get('Users/{id}/edit','userController@edit'); 
    Users/{id}   (put)          Route::put('Users/{id}','userController@update'); 
    Users/{id}   (delete)       Route::delete('Users/{id}','userController@destroy'); 
 */




//Route::view('Profile', 'student');
// Route::view('SignUp', 'Register');
// Route::post('Create',function (){
//     echo 'Your data sended';
// });
// Route::any('Student',function (){
//     return view('student');
// });


Route::match(['post','get'],'Student',function (){
    return view('student');
});






Route::get('User/{id?}',function ($var = null){

    echo 'User Id = '.$var;
});



Route::get('Subjcts/{id?}',function ($var = null){

    echo 'Sub Id = '.$var;
});



Route::get('Student/{name}/{id}',function ($name,$id){
    echo 'Student Name : '.$name;
})->where('name','[A-Za-z]+');


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






/*
    task .... 


    1-create db . 
    2- tasks (title,desc)





*/