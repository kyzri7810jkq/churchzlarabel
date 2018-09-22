<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname', 50);
            $table->string('firstname', 50);
            $table->string('middlename', 50)->nullable();
            $table->date('birthday');
            $table->string('address', 250)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('spouse', 50)->nullable();
            $table->string('total_kids', 50)->nullable();
            $table->integer('department')->nullable();
            $table->string('mentor', 100)->nullable();
            $table->string('work', 100)->nullable();
            $table->string('status', 100)->default('Active');
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
        Schema::dropIfExists('people');
    }
}
