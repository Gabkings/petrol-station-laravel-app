<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fuel_type_id');
            $table->unsignedBigInteger('period_id');
            $table->decimal('cost_per_litre',4,2);
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('sale_periods')->onDelete('cascade');
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
        Schema::dropIfExists('fuel_costs');
    }
}
