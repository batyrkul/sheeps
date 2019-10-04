<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZagonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zagons', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('day');
			$table->integer('zag1');
			$table->integer('zag2');
			$table->integer('zag3');
			$table->integer('zag4');
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
        Schema::dropIfExists('zagons');
    }
}
