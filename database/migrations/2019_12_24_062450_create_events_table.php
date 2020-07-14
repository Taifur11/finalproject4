<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('raiser_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->text('body');
            $table->double('goal', 12, 2);
            $table->double('raised', 12, 2)->default(0);
            $table->date('exdate');
            $table->integer('no_of_expire')->nullable();
            $table->boolean('expire_status')->default(false);
            $table->boolean('tx_status')->nullable();
            $table->string('tx_id')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            $table->foreign('raiser_id')
                ->references('id')->on('raisers')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
