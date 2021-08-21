<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createreservedmodel extends Migration
{
   public $id,$name,$area, $timestamp;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upreserved()
    {
        Schema::create('reserved', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('area');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downrejected()
    {
        Schema::dropIfExists('reserved');
    }
}
