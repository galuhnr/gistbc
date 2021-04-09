<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbrsNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->increments('id_rs'); 
            $table->integer('kecamatan_id')->unsigned()->after('id_rs');
            $table->foreign('kecamatan_id','fk_kecamatan_data_id')->references('id_kecamatan')->on('kecamatans')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama_rs',100);
            $table->string('alamat',100);
            $table->string('no_tlp',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbrs_new');
    }
}
