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
        Schema::create('reservation_package', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->decimal('price',9,3);
            $table->string('country');
            $table->longText('description');
            $table->string('image', 255);
            $table->timestamp('startDate');
            $table->timestamp('endDate');
            $table->timestamps();


            $table->integer('hotel_reservation_ID')->unsigned()->nullable();
            $table->foreign('hotel_reservation_ID')->references('id')->on('hotel');

            $table->integer('bus_reservationID')->unsigned()->nullable();
            $table->foreign('bus_reservationID')->references('id')->on('bus');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //

    }

};
