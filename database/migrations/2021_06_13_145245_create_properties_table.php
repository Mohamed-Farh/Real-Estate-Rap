<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('title_ar')->index();
            $table->string('title_en')->index();

            // $table->integer('agent_id')->nullable();

            $table->string('photo')->nullable();

            $table->double('price')->nullable()->index();
            $table->double('discount')->nullable();
            $table->double('new_price')->nullable();
            $table->double('size')->nullable()->index();

            $table->enum('purpose', ['sale', 'rent'])->nullable();
            $table->enum('status', ['for_sale', 'sold'])->nullable();
            $table->enum('used', ['new', 'used'])->nullble()->index();

            $table->string('images', 3000)->nullable();
            $table->string('video')->nullable();

            $table->integer('floornumber')->nullable();
            $table->integer('no_of_floor')->nullable();
            $table->integer('bedroom')->index();
            $table->integer('bathroom');

            $table->string('city_ar')->index();
            $table->string('city_en')->index();
            $table->string('address_ar')->index();
            $table->string('address_en')->index();
            $table->text('nearby_ar')->nullable();
            $table->text('nearby_en')->nullable();

            $table->text('description_ar');
            $table->text('description_en');

            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();


            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
