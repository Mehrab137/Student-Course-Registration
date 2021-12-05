<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_name')->nullable();
            $table->string('email_id')->unique()->nullable();
            $table->string('contact_number')->unique()->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('faculties');
    }
}
