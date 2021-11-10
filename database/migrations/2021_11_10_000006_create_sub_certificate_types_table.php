<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCertificateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_certificate_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_certificate_type')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
