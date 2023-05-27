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
        Schema::create('d_d_p_m_004_s', function (Blueprint $table) {
            $table->id();
            $table->string('SHELTERID')->nullable();
            $table->text('SHELTERNAME')->nullable();
            $table->string('PROVINCECODE')->nullable();
            $table->string('TAMBONCODE')->nullable();
            $table->string('POSTALCODE')->nullable();
            $table->string('LATITUDE')->nullable();
            $table->string('LONGITUDE')->nullable();
            $table->string('OFFICER')->nullable();
            $table->string('TEL')->nullable();
            $table->string('SHELTERTYPE')->nullable();
            $table->string('AREA')->nullable();
            $table->string('TOILETAMOUNT')->nullable();
            $table->string('DISTANCEFROMTOILET')->nullable();
            $table->string('HAVEWATER')->nullable();
            $table->string('WATERTYPE')->nullable();
            $table->string('WATERPERDAYFORCONSUMTION')->nullable();
            $table->string('WATERPERDAYFORSHELTER')->nullable();
            $table->string('PERSONAMOUNT')->nullable();
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
        Schema::dropIfExists('d_d_p_m_004_s');
    }
};
