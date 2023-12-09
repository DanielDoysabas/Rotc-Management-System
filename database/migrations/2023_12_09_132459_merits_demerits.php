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
        Schema::create('merits_demerits', function (Blueprint $table) {
            $table->id();
            $table->string('student');
            $table->string('student_id');
            $table->string('semester');
            $table->integer('merits');
            $table->integer('demerits');
            $table->integer('total_points');
            $table->integer('percentage');
            $table->string('year');
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
        Schema::dropIfExists('merits_demerits');
    }
};
