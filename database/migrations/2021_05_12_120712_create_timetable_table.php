<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('timetable_id');
            $table->string('session');
            $table->foreignId('unit_code_id')->constrained('units')->onDelete('cascade');
            $table->string('activity_id');
            $table->string('day');
            $table->string('campus');
            $table->time('start_time');
            $table->string('location');
            $table->integer('hrs_per_week');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->enum('position_type',['Casual','Permanent','Empty']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable');
    }
}
