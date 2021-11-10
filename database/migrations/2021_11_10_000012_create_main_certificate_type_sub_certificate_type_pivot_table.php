<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCertificateTypeSubCertificateTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('main_certificate_type_sub_certificate_type', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_certificate_type_id');
            $table->foreign('sub_certificate_type_id', 'sub_certificate_type_id_fk_5301869')->references('id')->on('sub_certificate_types')->onDelete('cascade');
            $table->unsignedBigInteger('main_certificate_type_id');
            $table->foreign('main_certificate_type_id', 'main_certificate_type_id_fk_5301869')->references('id')->on('main_certificate_types')->onDelete('cascade');
        });
    }
}
