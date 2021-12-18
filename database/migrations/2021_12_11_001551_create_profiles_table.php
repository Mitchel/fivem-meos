<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->string('fullname');
            $table->string('nationality');
            $table->string('citizen_number');
            $table->string('birthday');
            $table->string('gender');
            $table->string('dna_code');
            $table->string('fingerprint');
            $table->string('phone_number');
            $table->mediumText('comments')->nullable();
            $table->string('last_search')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
