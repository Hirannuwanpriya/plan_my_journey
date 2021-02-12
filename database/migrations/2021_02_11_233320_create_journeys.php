<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->default(1);
            $table->integer('tid')->default(0);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('start_address')->nullable();
            $table->string('start_lat')->nullable();
            $table->string('start_long')->nullable();
            $table->string('end_address')->nullable();
            $table->string('end_lat')->nullable();
            $table->string('end_long')->nullable();
            $table->string('distance_text')->nullable();
            $table->string('distance_value')->nullable();
            $table->string('duration_text')->nullable();
            $table->string('duration_value')->nullable();
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
        Schema::dropIfExists('journeise');
    }
}
