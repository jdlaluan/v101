<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ratings_faculty_tostudents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('task_id')->constrained('faculty_task_infos');
            $table->foreignId('submission_id')->constrained('student_submitted_tasks');
            $table->integer('score')->unsigned()->between(0, 100);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings_faculty_tostudents');
    }
};
