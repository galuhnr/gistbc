<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahSakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rumahsakit', function (Blueprint $table) {
            $table->increments('id_rs'); 
            $table->string('nama_rs',100);
            $table->string('no_tlp',20);
            $table->string('alamat',100);
            $table->integer('kecamatan_id')->unsigned()->after('alamat');
            $table->foreign('kecamatan_id','fk_kecamatan_data_id')->references('id_kecamatan')->on('kecamatans')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_sakits');
    }
}
