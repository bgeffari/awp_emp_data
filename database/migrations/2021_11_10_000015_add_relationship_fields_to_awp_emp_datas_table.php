<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAwpEmpDatasTable extends Migration
{
    public function up()
    {
        Schema::table('awp_emp_datas', function (Blueprint $table) {
            $table->unsignedBigInteger('main_certificate_type_id');
            $table->foreign('main_certificate_type_id', 'main_certificate_type_fk_5307465')->references('id')->on('main_certificate_types');
            $table->unsignedBigInteger('sub_certificate_type_id');
            $table->foreign('sub_certificate_type_id', 'sub_certificate_type_fk_5307466')->references('id')->on('sub_certificate_types');
            $table->unsignedBigInteger('major_id');
            $table->foreign('major_id', 'major_fk_5307467')->references('id')->on('majors');
            $table->unsignedBigInteger('academic_facility_id');
            $table->foreign('academic_facility_id', 'academic_facility_fk_5307468')->references('id')->on('academic_facilities');
        });
    }
}
