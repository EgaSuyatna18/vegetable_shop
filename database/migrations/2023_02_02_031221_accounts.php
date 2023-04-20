<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->nullable(false);
            $table->integer('gender_id')->nullable(false);
            $table->string('first_name', 25)->nullable(false);
            $table->string('last_name', 25)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('display_picture_link', 100)->nullable(false);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
};
