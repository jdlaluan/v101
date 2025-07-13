<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('students_taking_enrollment', function (Blueprint $table) {
            // Drop existing constraint first if needed
            $table->dropForeign(['user_id']);

            // Add proper foreign key constraints
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('course_grade_id')
                  ->references('id')
                  ->on('course_grade') // Note: matches your actual table name
                  ->onDelete('cascade');

            $table->foreign('agency_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('students_taking_enrollment', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_grade_id']);
            $table->dropForeign(['agency_id']);
            $table->dropForeign(['faculty_id']);
        });
    }
};
