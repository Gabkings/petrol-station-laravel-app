<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_readings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_string')->nullable();
            $table->decimal('start_reading',4,2);
            $table->decimal('close_reading',4,2);
            $table->unsignedBigInteger('tank_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tank_readings');
    }
}
