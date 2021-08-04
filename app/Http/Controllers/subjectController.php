<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\subject;

use DB;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // select subject.* , users.* from subject join users on users.id = subject.by

        // $data = DB::table('subject')
        //            -> join('users','users.id','=','subject.by')
        //            -> select('subject.*','users.id as UserId','users.name')
        //          //  -> where('subject.id',5)
        //            -> get();


         $data = subject::with('add_by')->get();


         return view('subjects.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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

      $op =   DB::table('subject')->where('id',$id)->delete();

      if($op){
          $message = "item removed";
      }else{
          $message = "error try again";
      }

           session()->flash('Message',$message);
        return redirect(url('/Subject'));
    }
}
