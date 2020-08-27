<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBamboosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bamboos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo');
            $table->string('sci_name');
            $table->string('com_name')->nullable();
            $table->string('loc_name')->nullable();
            $table->string('family')->nullable();
            $table->string('genus')->nullable();
            $table->string('species')->nullable();
            $table->string('auth_name')->nullable();
            $table->string('size');
            $table->longText('description');
            $table->string('comments')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
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
        Schema::dropIfExists('bamboos');
    }
}
