<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createrejectedmodel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function uprejected()
    {
        Schema::create('rejected', function (Blueprint $table) {
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
        Schema::dropIfExists('rejected');
    }
}
