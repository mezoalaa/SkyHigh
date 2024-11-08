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
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('flight_id');
            $table->string('status')->default('pending'); // example field for booking status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flight_bookings');
    }
};
