<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseratingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseratings', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('rating_done_by');
            $table->integer('rating');
            $table->integer('status')->default(1)->comment('0:Inactive,1:Active');
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
        Schema::dropIfExists('courseratings');
    }
}
