<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_submitted_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('faculty_task_infos');
            $table->foreignId('student_id')->constrained('users');
            $table->string('file_path');
            $table->text('comments')->nullable();
            $table->timestamp('submitted_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_submitted_tasks');
    }
};
