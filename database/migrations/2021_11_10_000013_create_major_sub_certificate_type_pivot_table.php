<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorSubCertificateTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('major_sub_certificate_type', function (Blueprint $table) {
            $table->unsignedBigInteger('major_id');
            $table->foreign('major_id', 'major_id_fk_5307395')->references('id')->on('majors')->onDelete('cascade');
            $table->unsignedBigInteger('sub_certificate_type_id');
            $table->foreign('sub_certificate_type_id', 'sub_certificate_type_id_fk_5307395')->references('id')->on('sub_certificate_types')->onDelete('cascade');
        });
    }
}
