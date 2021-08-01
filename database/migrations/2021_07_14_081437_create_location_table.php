<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_ar')->index()->nullable();
            $table->string('country_en')->index()->nullable();
            $table->string('city_ar')->index()->nullable();
            $table->string('city_en')->index()->nullable();
            $table->string('address_ar')->index()->nullable();
            $table->string('address_en')->index()->nullable();
            $table->double('location_latitude')->nullable();
            $table->double('location_longitude')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('location');
    }
}
