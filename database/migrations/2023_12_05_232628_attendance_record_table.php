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
            $table->foreignId('student_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('1st');
            $table->integer('2nd');
            $table->integer('3rd');
            $table->integer('4th');
            $table->integer('5th');
            $table->integer('6th');
            $table->integer('7th');
            $table->integer('8th');
            $table->integer('9th');
            $table->integer('10th');
            $table->integer('11th');
            $table->integer('12th');
            $table->integer('13th');
            $table->integer('14th');
            $table->integer('15th');
            $table->integer('total_points');
            $table->integer('average');
            $table->integer('percentage');
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
