<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
   // use HasFactory;


  protected $table = "subject";


  protected $fillable = ['title','by'];



    public function add_by(){

      return  $this->belongsTo('App\Models\User','by','id');
    }


}
