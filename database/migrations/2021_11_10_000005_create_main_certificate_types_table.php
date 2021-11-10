<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCertificateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('main_certificate_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('certificate_type')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
