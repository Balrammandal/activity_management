<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->enum('activity_type',['Call','Email','Visit']);
            $table->string('time');
            $table->longText('description');
            $table->longText('next_act_desc');
            $table->longText('next_act_time');
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
        Schema::dropIfExists('activity');
    }
}
