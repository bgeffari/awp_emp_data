<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicFacilityMainCertificateTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('academic_facility_main_certificate_type', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_facility_id');
            $table->foreign('academic_facility_id', 'academic_facility_id_fk_5307438')->references('id')->on('academic_facilities')->onDelete('cascade');
            $table->unsignedBigInteger('main_certificate_type_id');
            $table->foreign('main_certificate_type_id', 'main_certificate_type_id_fk_5307438')->references('id')->on('main_certificate_types')->onDelete('cascade');
        });
    }
}
