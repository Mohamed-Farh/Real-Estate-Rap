<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutus', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('aboutus_ar');
            $table->longText('aboutus_en');

            $table->integer('client')->nullable();
            $table->integer('experience_year')->nullable();
            $table->integer('previous_project')->nullable();
            $table->integer('under_construction')->nullable();

            $table->longText('message_ar');
            $table->longText('message_en');

            $table->longText('vision_ar');
            $table->longText('vision_en');

            $table->longText('whyus_ar');
            $table->longText('whyus_en');

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
        Schema::dropIfExists('aboutus');
    }
}
