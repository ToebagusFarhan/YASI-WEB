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
        Schema::create('data_informations', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement()->comment('Unique identifier for the data entry');

            $table->unsignedBigInteger('user_id')->nullable()->comment('Foreign key referencing the user_id in the User Information table');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('provider_name')->nullable()->comment('Name of the signal provider');
            $table->string('city_name')->nullable()->comment('Name of the area where the signal data was collected');
            $table->string('address')->nullable()->comment('Specific address or landmark for the location');
            $table->date('date')->nullable()->comment('Date when the data was collected');
            $table->time('time')->nullable()->comment('Time when the data was collected');
            $table->string('signal_stability')->nullable()->comment('Qualitative assessment of signal stability (e.g., excellent, good, moderate, poor)');
            $table->integer('user_rating')->nullable()->comment('User rating of the signal quality (e.g., 1-5 stars)');
            $table->text('comments')->nullable()->comment('Additional comments or feedback from the user');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_informations');
    }
};
