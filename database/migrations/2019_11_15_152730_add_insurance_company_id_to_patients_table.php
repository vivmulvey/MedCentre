<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddInsuranceCompanyIdToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
          $table->dropColumn('insurance_company');
          $table->bigInteger('insurance_company_id')->unsigned();

          $table->foreign('insurance_company_id')->references('id')->on('insurance_company');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
          $table->dropForeign('insurance_company_id');
          $table->dropColumn('insurance_company_id');

          $table->string('insurance_company');
        });
    }
}
