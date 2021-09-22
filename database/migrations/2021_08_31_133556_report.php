<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no');
            $table->bigInteger('member_nik');
            $table->string('noRegister');
            $table->string('tanggal');
            $table->string('tujuan');
            $table->string('keperluan');
            $table->string('keterangan');
            $table->string('jenisSurat');
            $table->bigInteger('admin_nik');
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
        //
    }
}
