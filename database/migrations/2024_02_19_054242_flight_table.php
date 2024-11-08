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
        Schema::create('flight', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price',9,3);
            $table->timestamp('date');
            $table->string('location');
            $table->string('destination');
            $table->unsignedInteger('airport_id');
            // $table->foreign('airport_id')->references('id')->on('airport');
            $table->unsignedInteger('airline_id');
            $table->unsignedInteger('user_id');

            // $table->foreign('airline_id')->references('id')->on('airline');
            // $table->foreignId('airline_id')->constrained('airline')->onUpdate('cascade')->onDelete('cascade');


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
