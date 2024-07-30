<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracerStudiesTable extends Migration
{
    public function up()
    {
        Schema::create('tracer_studies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nim');
            $table->string('jenis_kelamin');
            $table->string('asal_prodi');
            $table->string('nama');
            $table->string('agama');
            $table->string('hp');
            $table->string('email');
            $table->string('tahun_masuk');
            $table->string('tahun_lulus');
            $table->string('status');
            $table->string('mulai_mencari');
            $table->string('tingkat_pekerjaan');
            $table->json('cara_mencari_pekerjaan');
            $table->string('pekerjaan');
            $table->string('jarak_tahun_lulus');
            $table->string('range_gaji');
            $table->string('jenis_perusahaan');
            $table->string('kesesuaian');
            $table->string('nama_perusahaan');
            $table->string('provinsi_kerja');
            $table->string('kabupaten_kerja');
            $table->string('tingkat_pendidikan');
            $table->string('studi_yang_diambil');
            $table->string('nama_institusi');
            $table->string('lokasi_kampus');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracer_studies');
    }
}
