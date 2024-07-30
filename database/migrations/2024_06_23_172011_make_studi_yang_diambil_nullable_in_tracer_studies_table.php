<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeStudiYangDiambilNullableInTracerStudiesTable extends Migration
{
    public function up()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->string('studi_yang_diambil')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->string('studi_yang_diambil')->nullable(false)->change();
        });
    }
}
