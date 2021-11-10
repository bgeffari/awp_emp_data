<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwpEmpDatasTable extends Migration
{
    public function up()
    {
        Schema::create('awp_emp_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('emp_sap_number')->unique();
            $table->string('full_name');
            $table->string('last_certificate_country');
            $table->integer('mobile')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
