<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Str;

class SurveyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateSuccess()
    {
        $this->seed([UserSeeder::class]);

        $token = 'test';

        $this->post('/api/survey', [
            // Biodata
            'nama' => 'asd',
            'nim' => 123456789,
            'fakultas' => 'Fakultas Teknik',
            'program_studi' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-Laki',
            'email_kampus' => 'john.doe@example.com',
            'email_pribadi' => 'john.doe@gmail.com',
            'no_hp' => '081234567890',

            // // Data Wisuda
            'tahun_masuk' => 2015,
            'tahun_lulus' => 2019,

            // // Data Pekerjaan
            'kapan_anda_mulai_mencari_pekerjaan' => 'Beberapa bulan sebelum lulus',
            'apa_tingkat_tempat_kerja_anda' => 'Internasional',
            'bagaimana_anda_mencari_pekerjaan_tersebut' => [
                'Melalui iklan di koran/majalah, brosur',
                'Mencari lewat internet/iklan online/milis',
            ],
            'pekerjaan_anda' => 'Karyawan Swasta/Staff',
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => 'Kurang dari 6 bulan',
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => '5 – 8 Juta',
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => 'Perusahaan swasta',
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => 'Sesuai',
            'nama_perusahaan_instansi_tempat_anda_bekerja' => 'PT. Contoh Perusahaan',
            'provinsi_tempat_kerja' => 'Jawa Barat',

            'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => 'Tingkat yang sama',

            'studi_yang_diambil' => 'S2',
            'nama_program_studi_yang_diambil' => 'Magister Manajemen',
            'nama_kampus' => 'Universitas Contoh'
        ], [

            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(201)->assertJson([
            'data' => [
                // Biodata
                'nama' => 'asd',
                'nim' => 123456789,
                'fakultas' => 'Fakultas Teknik',
                'program_studi' => 'Teknik Informatika',
                'jenis_kelamin' => 'Laki-Laki',
                'email_kampus' => 'john.doe@example.com',
                'email_pribadi' => 'john.doe@gmail.com',
                'no_hp' => '081234567890',

                // // Data Wisuda
                'tahun_masuk' => 2015,
                'tahun_lulus' => 2019,

                // // Data Pekerjaan
                'kapan_anda_mulai_mencari_pekerjaan' => 'Beberapa bulan sebelum lulus',
                'apa_tingkat_tempat_kerja_anda' => 'Internasional',
                'bagaimana_anda_mencari_pekerjaan_tersebut' => [
                    'Melalui iklan di koran/majalah, brosur',
                    'Mencari lewat internet/iklan online/milis',
                ],
                'pekerjaan_anda' => 'Karyawan Swasta/Staff',
                'jarak_tahun_lulus_dan_mendapat_pekerjaan' => 'Kurang dari 6 bulan',
                'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => '5 – 8 Juta',
                'jenis_perusahaan_instansi_tempat_anda_bekerja' => 'Perusahaan swasta',
                'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => 'Sesuai',
                'nama_perusahaan_instansi_tempat_anda_bekerja' => 'PT. Contoh Perusahaan',
                'provinsi_tempat_kerja' => 'Jawa Barat',

                'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => 'Tingkat yang sama',

                'studi_yang_diambil' => 'S2',
                'nama_program_studi_yang_diambil' => 'Magister Manajemen',
                'nama_kampus' => 'Universitas Contoh'
            ]
        ]);
    }

    // public function testEditSurvey(){
    //     $this->testCreateSuccess();

    //     $token = 'test';

    //     $this->patch('/api/survey', [
    //         "nama"=>"jamaludin",

    //     ], [
    //         'Authorization' => 'Bearer ' . $token
    //     ])->assertStatus(200);
    // }

    public function testEditSurvey()
    {
        $this->testCreateSuccess();

        $token = 'test';

        $a = $this->patch('/api/survey', [
            "nama" => "jamaludin",

        ], [
            'Authorization' => 'Bearer ' . $token
        ]);

        dump($a->getContent());
    }
}
