<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToFaculties extends Migration
{
    public function up()
    {
        Schema::table('faculties', function (Blueprint $table) {

            $table->bigInteger('course_id')->unsigned()->nullable()->after('department_id');

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->bigInteger('section_id')->unsigned()->nullable()->after('course_id');

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faculties', function (Blueprint $table) {
            //
        });
    }
}
