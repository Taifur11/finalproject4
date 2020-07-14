<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_title')->nullable();
            $table->string('event_body')->nullable();
            $table->double('event_goal', 12, 2)->default(0);
            $table->double('event_raised', 12, 2)->default(0);
            $table->integer('event_days')->default(0);
            $table->string('creator_name')->nullable();
            $table->string('creator_email')->nullable();
            $table->string('creator_image')->default('default.png');
            $table->string('event_image')->default('default.png');
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
        Schema::dropIfExists('event_histories');
    }
}
