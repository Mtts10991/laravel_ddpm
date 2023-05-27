<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_d_p_m_003_s', function (Blueprint $table) {
            $table->id();
            $table->string('DPM_CENTER_ID')->nullable();
            $table->string('CODE')->nullable();
            $table->string('NAME')->nullable();
            $table->string('TYPE')->nullable();
            $table->text('ADDRESS')->nullable();
            $table->text('PROVINCE_ID')->nullable();
            $table->string('PROVINCE_NAME')->nullable();
            $table->string('AMPHUR_ID')->nullable();
            $table->string('AMPHUR_NAME')->nullable();
            $table->string('DISTRICT_ID')->nullable();
            $table->string('DISTRICT_NAME')->nullable();
            $table->string('TEL')->nullable();
            $table->string('FAX')->nullable();
            $table->string('EMAIL')->nullable();
            $table->string('WEBSITE')->nullable();
            $table->string('LATITUDE')->nullable();
            $table->string('LONGITUDE')->nullable();
            $table->string('VOLUNTEER_AMT')->nullable();
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
        Schema::dropIfExists('d_d_p_m_003_s');
    }
};
