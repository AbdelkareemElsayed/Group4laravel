<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\student;

use DB;

class userController extends Controller
{




       public   function __construct(){
                 
            $this->middleware('checkAuth',['except' => ['index','loginView','login']]);

       }


     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $data = User::with('Subjects')->orderby('id','desc')->get();


        //  $data = DB::table('subject');

        return view('usersModule.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usersModule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
       $data =  $this->validate($request,
        [
            "name"  => "required|min:3",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ]);


        $data['password'] = bcrypt($data['password']);
        
        $op =  User::create($data);
        
        
         if($op){
            $message = "User Inserted ";
         }else{
            $message = "Error Try Again";
         }

    
        // session()->put('name',"amed");    // $_SESSION['KEY'] = 'VALUE';
        // session()->put('email',"amed@yahoo.com");



        session()->flash('Message',$message);
        return redirect(url('/Users'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('usersModule.edit',['data' => $data]);

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

     $data = $this->validate($request,[

         "name"  => "required|min:3",
         "email" => "required|email",
        
     ]);


     $op = User::where('id',$id)->update($data);


     if($op){
        $message = "User Updated ";
     }else{
        $message = "Error Try Again";
     }


    session()->flash('Message',$message);
    return redirect(url('/Users'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $op = User::where('id',$id)->delete();

        if($op){
            $message = "User Deleted ";
         }else{
            $message = "Error Try Again";
         }
    
        session()->flash('Message',$message);
        return redirect(url('/Users'));


    }




   public function loginView(){
       return view('usersModule.login');
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



     if(auth()->attempt($data,$flag)){

        return redirect(url('/Users'));
     }else{
        return redirect(url('/Login'));
     }


   }



   public function logout(){
       // Logic

       auth()->logout();

       return redirect(url('/Login'));

   }


}
