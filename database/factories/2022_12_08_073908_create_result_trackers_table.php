<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('calendar_year_id')->references('id')->on('calendar_years');
            $table->foreign('admin_id')->references('id')->on('admins');
            //$table->unique(['classroom_id', 'calendar_year_id']);
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
        Schema::dropIfExists('result_trackers');
    }
}
