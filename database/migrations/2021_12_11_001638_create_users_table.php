<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('picture');
            $table->string('fullname');
            $table->string('call_sign');
            $table->string('function');
            $table->string('nationality');
            $table->string('citizen_number');
            $table->string('birthday');
            $table->string('phone_number');
            $table->string('dna_code');
            $table->string('gender');
            $table->string('fingerprint');
            $table->string('weapon');
            $table->string('taser');
            $table->mediumText('comments');
            $table->string('detective');
            $table->string('detective_supervisor');
            $table->string('supervisor');
            $table->string('admin');
            $table->string('last_login');
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
        Schema::dropIfExists('users');
    }
}
