<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Warga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama');
            $table->string('jenis-kelamin');
            $table->string('ttl');
            $table->string('agama');
            $table->string('status');
            $table->string('negara');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('no-kk');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->string('keperluan');
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
