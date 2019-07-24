<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShenasnamePeimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shenasname_peimens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contractTitle')->nullable();
            $table->string('docNumber')->nullable();
            $table->string('contractNumber')->nullable();
            $table->string('contractDate')->nullable();
            $table->string('requestNumber')->nullable();
            $table->string('requestDate')->nullable();
            $table->string('commitmentNumber')->nullable();
            $table->string('projectId')->nullable();
            $table->string('insuranceId')->nullable();
            $table->string('rotbe')->nullable();
            $table->string('managerName')->nullable();
            $table->string('companyName')->nullable();
            $table->string('companyPhone')->nullable();
            $table->string('companyAdd')->nullable();
            $table->string('workType')->nullable();
            $table->string('observer')->nullable();
            $table->string('projectManager')->nullable();
            $table->string('firstPrice')->nullable();
            $table->string('tazminPeriod')->nullable();
            $table->string('contractPeriod')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('gheireNaghdi')->nullable();
            $table->string('naghdi')->nullable();
            $table->string('peinmankarChoice')->nullable();
            $table->string('kargozarName')->nullable();
            $table->string('tavafohname')->nullable();
            $table->string('tavafohnameDate')->nullable();
            $table->string('komesionMoamelatNum')->nullable();
            $table->string('komesionMoamelatNumDate')->nullable();
            $table->string('monagheseSessionNumber')->nullable();
            $table->string('monagheseSessionNumberDate')->nullable();
            $table->string('permissionNumber')->nullable();
            $table->string('permissionNumberDate')->nullable();
            $table->string('contractTaraf')->nullable();
            $table->string('scannedFile')->nullable();
            $table->string('privacyFile')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shenasname_peimen');
    }
}
