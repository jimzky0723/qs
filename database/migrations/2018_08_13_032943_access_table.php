<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('registration');
            $table->integer('card');
            $table->integer('vital');
            $table->integer('pedia');
            $table->integer('im');
            $table->integer('surgery');
            $table->integer('ob');
            $table->integer('dental');
            $table->integer('bite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access');
    }
}
