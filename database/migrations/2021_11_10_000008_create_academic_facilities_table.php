<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('academic_facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('academic_facility')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
