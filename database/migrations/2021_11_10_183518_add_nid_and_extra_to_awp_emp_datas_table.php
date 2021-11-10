<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNidAndExtraToAwpEmpDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('awp_emp_datas', function (Blueprint $table) {

            $table->integer('nid')->unique();
            $table->longText('extra')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('awp_emp_datas', function (Blueprint $table) {
            $table->dropColumn('nid');
            $table->dropColumn('extra');
        });
    }
}
