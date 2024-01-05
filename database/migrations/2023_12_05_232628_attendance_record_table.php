<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->string('student');
            $table->string('student_id');
            $table->string('day_one');
            $table->string('day_two');
            $table->string('day_three');
            $table->string('day_four');
            $table->string('day_five');
            $table->string('day_six');
            $table->string('day_seven');
            $table->string('day_eight');
            $table->string('day_nine');
            $table->string('day_ten');
            $table->string('day_eleven');
            $table->string('day_twelve');
            $table->string('day_thirtheen');
            $table->string('day_fourtheen');
            $table->string('day_fiftheen');
            $table->integer('total_points');
            $table->integer('average');
            $table->integer('percentage_record');
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
        //
        Schema::dropIfExists('attendance_records');
    }
};
