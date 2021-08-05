<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class testController extends Controller
{
    //

    public   function __construct(){
                 
        $this->middleware('studentCheck',['except' => ['login_show','login']]);

    }





   public function register(){
       return view('Register');
   }


   public function Store(Request $request){
       // Logic 
   
        //  echo  $request->email.'<br>'.$request->password;
        //  echo  $request->input('email');
        //  dd($request->has('email'));
        //  echo  $request->url().'<br>';
        //  echo $request->fullUrl();
        //  echo  $request->method();
        //  echo $request->isMethod('post');
        //  echo $request->ip();
        //  dd($request->all());   
        //  dd( $request->only(['email','password']));
        //  dd($request->except('_token'));

    // request() = $request
        
    // dd(request());

       $data =    $this->validate(request(),[
            "email"    => "required|email",
            "password" => "required|min:6" 
          ]);



          $data['password'] =  bcrypt($request->password);


         $op = student::create($data);
        
         $message = '';

         if($op){
            $message = "Data inserted";
         }else{
             $message = "Error try again";
         }

         
         return back()->with($message);
         


   
    }
  



   public function displayStudents(){

     // Logic .... 

   $data =  student::get();

     return view('indexStudent',['data' => $data]);


   }




   public function deleteStudent($id){
     
   // logic .... 

    $op =  student::where('id',$id)->delete();
     
    if($op){
        return back();
    }else{
        echo 'error try again';
    }

   }





   public function showData($id){
    // Logic

    // $data = student::where('id',$id)->get();
       $data = student::find($id);

       return view('edit',['data' => $data]);

   }


   public function edit(Request $request){
    
    // logic ... 

       $data =    $this->validate(request(),[
        "email"    => "required|email",
      ]);


      $op = student::where('id',$request->id)->update($data);

      if($op){
          return back();
      }else{
          echo 'error try again';
      }


   }





    // public function Message(){
    //     echo 'welcome to laravel';
    // }

    // public function GetProfile(){

    //    // return view('student',['title' => 'cs', 'id' => 1]);
 
    //        $data = ['title' => 'cs', 'id' => 1];
    //        $name = "root";

    // //      return view('student')->with($data);


    //         return view('student',compact('data','name'));


    // }


    public function login_show(){

        return view('StudentLogin');
    }


    public function login(Request $request){
        // Logic 
    
         $data = $this->validate($request,[
    
            "email"     => "required|email",
            "password"  => "required|min:6"
         ]);
    
           $flag = false;
           
           if($request->rem_me){
               $flag = true;
           }
    
    
    
         if(auth()->guard('student')->attempt($data,$flag)){
    
           return redirect(url('/display'));

        
        }else{
          return redirect(url('/StudentLogin'));
   
        }
    
    
       }
    




}







