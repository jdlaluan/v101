<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faculty_task_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('grading_code_id')->constrained('semester_grading');
            $table->string('task_name');
            $table->text('task_description');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculty_task_infos');
    }
};
