<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBricksTables extends Migration
{


    public function up()
    {
        Schema::create('bricks', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->text('html')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bricks');
    }


}
