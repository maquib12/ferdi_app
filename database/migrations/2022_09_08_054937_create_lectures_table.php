<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('name');
            $table->string('description');
            $table->string('images')->nullable();
            $table->string('videos')->nullable();
            $table->integer('level')->comment('1:Beginner Level , 1:Intermediate Level , 1:Advanced Level');
            $table->integer('time')->nullable();
            $table->integer('status')->default('1')->comment('0 for inactive, 1 for active');
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
        Schema::dropIfExists('lectures');
    }
}
