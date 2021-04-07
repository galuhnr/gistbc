<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kriterias', function (Blueprint $table) {
            $table->increments('id_data');
            $table->integer('tahun_id')->unsigned()->after('id_data');
            $table->foreign('tahun_id','fk_tahun_data_id')->references('id_tahun')->on('tahuns')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kecamatan_id')->unsigned()->after('id_data');
            $table->foreign('kecamatan_id','fk_kecamatan_data_id')->references('id_kecamatan')->on('kecamatans')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_faskes');
            $table->integer('jml_kasus');
            $table->integer('jml_rumahts');
            $table->integer('jml_kp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kriterias');
    }
}
