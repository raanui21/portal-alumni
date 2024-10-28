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
        Schema::create('surveys', function (Blueprint $table) {
            $table->uuid("id")->primary();
            // Biodata
            // $table->string('nama');
            // $table->bigInteger('nim')->unique();
            // $table->string('fakultas');
            // $table->string('program_studi');
            // $table->string('jenis_kelamin');
            // $table->string('email_kampus')->unique();
            // $table->string('email_pribadi')->unique();
            // $table->string('no_hp');
            
            // // Data Wisuda
            $table->integer('tahun_masuk');
            $table->integer('tahun_lulus')->nullable();

            // // Data Pekerjaan
            $table->enum('kapan_anda_mulai_mencari_pekerjaan', [
                'Beberapa bulan setelah lulus',
                'Beberapa bulan sebelum lulus',
                'Belum/Tidak Mencari Kerja'
            ])->nullable();
            $table->enum('apa_tingkat_tempat_kerja_anda', [
                'Lokal/Wiraswasta tidak berbadan hukum',
                'Nasional/Wiraswasta berbadan hukum',
                'Internasional'
            ]);
            $table->text('bagaimana_anda_mencari_pekerjaan_tersebut');
            $table->enum('pekerjaan_anda', [
                'Belum Bekerja',
                'Karyawan Swasta/Staff',
                'Wirausaha/Pemilik Usaha',
                'First Line Management/Eselon IV',
                'Middle Line Management/Eselon III',
                'Top Management/Eselon I dan Eselon II',
                'Guru',
                'Dosen',
                'Melanjutkan Pendidikan'
            ]);
            $table->enum('jarak_tahun_lulus_dan_mendapat_pekerjaan', [
                'Kurang dari 6 bulan',
                '6 Bulan - 1 Tahun',
                'Lebih dari 1 Tahun',
                'Sedang Wirausaha'
            ]);
            $table->enum('berapa_range_gaji_anda_ditempat_kerja_setiap_bulan', [
                'Kurang dari 3 Juta',
                '3 - 5 Juta',
                '5 – 8 Juta',
                '8 – 10 Juta',
                'Lebih dari 10 Juta'
            ]);
            $table->enum('jenis_perusahaan_instansi_tempat_anda_bekerja', [
                'Instansi Pemerintah',
                'Organisasi non-profit/Lembaga Swadaya Masyarakat',
                'Perusahaan swasta',
                'Wiraswasta/Bekerja Sendiri',
                'BUMN/BUMD',
                'Institusi/Organisasi multilateral',
                'Lainnya'
            ]);
            $table->enum('apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda', [
                'Sangat Sesuai',
                'Sesuai',
                'Netral',
                'Kurang Sesuai',
                'Tidak Sesuai',
            ]);
            $table->string('nama_perusahaan_instansi_tempat_anda_bekerja')->nullable();
            $table->string('provinsi_tempat_kerja')->nullable();
            $table->enum('tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini', [
                'Setingkat lebih tinggi',
                'Tingkat yang sama',
                'Setingkat lebih rendah',
                'Tidak perlu pendidikan tinggi'
            ]);

            //Data Studi
            $table->enum('studi_yang_diambil', ['S2', 'S3','Tidak Mengambil Studi Lanjut']) ->nullable();
            $table->string('nama_program_studi_yang_diambil')->nullable();
            $table->string('nama_kampus')->nullable();
            // $table->string('created_at')->nullable();
            // $table->string('updated_at')->nullable();


            $table->timestamps();

            $table->uuid("user_id");
            // $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
