<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNamaInstitusiAndLokasiKampusNullableInTracerStudiesTable extends Migration
{
    public function up()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->string('nama_institusi')->nullable()->change();
            $table->string('lokasi_kampus')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->string('nama_institusi')->nullable(false)->change();
            $table->string('lokasi_kampus')->nullable(false)->change();
        });
    }
}
