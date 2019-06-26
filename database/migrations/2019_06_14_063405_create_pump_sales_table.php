<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePumpSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pump_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_string')->nullable();
            $table->unsignedBigInteger('pump_id');
            $table->decimal('volume_sold',4,2);
            $table->foreign('pump_id')->references('id')->on('pumps')->onDelete('cascade');
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
        Schema::dropIfExists('pump_sales');
    }
}
