<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('by');
            $table->timestamps();
        });

        
        Schema::table('subject', function (Blueprint $table) {
            
             $table->foreign('by')->references('id')->on('users');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('subject');
    }
}
