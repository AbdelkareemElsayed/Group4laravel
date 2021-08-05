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


 Route::get('/Lang/{lang}',function ($lang){
     
    // code .... 
      session()->put('lang',$lang);     
      return back();
 });



// Route::get('Message',function (){

//     echo 'Welcome to laravel';
// });


// Route::get('Student',function (){
//     return view('student');
// });


 Route::get('Message','testController@Message');
 Route::get('Profile','testController@GetProfile');

// student
 Route::get('display','testController@displayStudents');
 Route::get('Register','testcontroller@register');
 Route::post('StoreStudent','testcontroller@Store');
 Route::get('deleteStudent/{id}','testController@deleteStudent');
 Route::get('edit/{id}','testController@showData');
 Route::post('update','testController@edit');
 Route::get('StudentLogin','testController@login_show');
 Route::post('StudentDoLogin','testController@login');


 Route::resource('Users','userController');//->middleware('checkAuth');

 Route::get('Login','userController@loginView')->name('login');

 Route::post('doLogin','userController@login');

 Route::get('LogOut','userController@logout');

Route::resource('Subject','subjectController');




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



    ====================================


    users 

    1 - register  (email,password,role) roles[1-admin,2-students]
    2-  login 
    3- logout 


    4 - create view activateSystem  role = 1











*/