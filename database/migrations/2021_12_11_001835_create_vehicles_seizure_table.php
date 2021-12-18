<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesSeizureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_seizure', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('type');
            $table->string('license_plate');
            $table->string('citizen_number');
            $table->string('end_date');
            $table->string('reason');
            $table->string('last_search');
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
        Schema::dropIfExists('vehicles_seizure');
    }
}
