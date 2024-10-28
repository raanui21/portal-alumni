<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("id")->primary(true);
            $table->string("nama", 100)->nullable(false);
            $table->bigInteger('nim')->unique();
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable();

            $table->string('agama')->nullable();

            $table->enum('jenis_kelamin', [
                'Laki-Laki',
                'Perempuan',
            ])->nullable();



            $table->string("email", 100)->nullable(false)->unique(true);
            $table->string("email_pribadi", 100)->nullable(false)->unique(true);
            
            $table->string('no_hp');

            $table->string('image_path')->nullable();
            
            $table->enum('role',['admin','alumni'])->default('alumni');
            $table->string("password", 100)->nullable(false);
            $table->string("token", 100)->nullable(true)->unique("users_token_unique");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
