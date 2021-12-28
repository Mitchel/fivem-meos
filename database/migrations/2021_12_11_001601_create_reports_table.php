<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('citizen_number')->nullable();
            $table->string('type');
            $table->string('date');
            $table->string('time');
            $table->string('report_number');
            $table->string('title');
            $table->string('identity_search');
            $table->string('security_search');
            $table->string('seizure');
            $table->string('transport_cuffs');
            $table->string('used_force');
            $table->string('legal_aid');
            $table->string('rights_read');
            $table->longText('findings');
            $table->mediumText('statement')->nullable();
            $table->mediumText('comments')->nullable();
            $table->string('cell');
            $table->string('penalty');
            $table->string('laws');
            $table->string('created_by');
            $table->string('created_by_function');
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
        Schema::dropIfExists('reports');
    }
}
