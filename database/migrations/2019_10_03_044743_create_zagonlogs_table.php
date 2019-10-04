<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZagonlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zagonlogs', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('day');
            $table->integer('zagid');
            $table->integer('count');
			$table->string('type');
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
        Schema::dropIfExists('zagonlogs');
    }
}
