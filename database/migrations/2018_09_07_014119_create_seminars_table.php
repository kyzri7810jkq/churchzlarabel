<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch');
            $table->integer('track_id');
            $table->integer('people_id');
            $table->string('tag')->default('first_timer'); //refresher
            $table->string('status')->default('incomplete'); //completed
            $table->string('comment');
            $table->date('date_ofevent');
            $table->date('reference')->nullable(); // reference number of hardcopy
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
        Schema::dropIfExists('seminars');
    }
}
