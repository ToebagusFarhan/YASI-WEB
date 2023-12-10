<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement()->comment('Unique identifier for the user');
            $table->string('username')->unique()->nullable()->comment('Username for login');
            $table->string('password')->nullable()->comment('Hashed password for the user');
            $table->string('email')->unique()->nullable()->comment('User\'s email address');
            $table->string('fullname')->nullable()->comment('User\'s full name');
            $table->string('phone')->nullable()->comment('User\'s phone number');
            $table->string('city_name')->nullable()->comment('User\'s city');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
