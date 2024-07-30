<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveStatusFromTracerStudiesTable extends Migration
{
    public function up()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    public function down()
    {
        Schema::table('tracer_studies', function (Blueprint $table) {
            $table->string('status')->nullable();
        });
    }
}
