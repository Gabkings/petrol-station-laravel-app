<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDairlySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dairly_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('cash_sale',4,2);
            $table->decimal('credit_sale',4,2);
            $table->unsignedBigInteger('pump_sale_id');
            $table->foreign('pump_sale_id')->references('id')->on('pump_sales')->onDelete('cascade');
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
        Schema::dropIfExists('dairly_sales');
    }
}
