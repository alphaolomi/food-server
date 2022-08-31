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
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('status')->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('settings')->default('');
            $table->string('image')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('provider_refreshToken')->nullable();
            $table->string('provider_expiresIn')->nullable();
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
        Schema::dropIfExists('users');
    }
}
