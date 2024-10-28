<?php

namespace Database\Factories;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Survey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kampusLocations = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Semarang', 'Medan', 'Makassar'];

        return [
            'id' => Str::uuid(),
            // 'nama' => $this->faker->name,
            // 'nim' => $this->faker->numerify('########'),
            // 'fakultas' => $this->faker->randomElement(['Fakultas Teknik', 'Fakultas Ekonomi', 'Fakultas Hukum', 'Fakultas Kedokteran', 'Fakultas Ilmu Sosial dan Politik']),
            // 'program_studi' => $this->faker->randomElement(['Teknik Informatika', 'Manajemen', 'Hukum', 'Kedokteran', 'Administrasi Publik']),
            // 'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            // 'email_kampus' => $this->faker->unique()->safeEmail,
            // 'email_pribadi' => $this->faker->unique()->safeEmail,
            // 'no_hp' => '08' . $this->faker->randomNumber(9, true),

            'tahun_masuk' => $tahunMasuk = $this->faker->numberBetween(2010, 2020), // Store the value for later use
            'tahun_lulus' => $tahunMasuk + $this->faker->numberBetween(3, 4), // Adjust the range as needed

            'kapan_anda_mulai_mencari_pekerjaan' => $this->faker->randomElement(['Beberapa bulan setelah lulus', 'Beberapa bulan sebelum lulus', 'Belum/Tidak Mencari Kerja']),
            'apa_tingkat_tempat_kerja_anda' => $this->faker->randomElement(['Lokal/Wiraswasta tidak berbadan hukum', 'Nasional/Wiraswasta berbadan hukum', 'Internasional']),
            'bagaimana_anda_mencari_pekerjaan_tersebut' => $this->faker->randomElements([
                'Melalui iklan di koran/majalah, brosur',
                'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
                'Pergi ke bursa/pameran kerja',
                'Mencari lewat internet/iklan online/milis',
                'Dihubungi oleh perusahaan',
                'Menghubungi Kemenakertrans',
                'Menghubungi agen tenaga kerja komersial/swasta',
                'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',
                'Menghubungi kantor kemahasiswaan/hubungan alumni',
                'Membangun jejaring (network) sejak masih kuliah',
                'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)',
                'Membangun bisnis sendiri',
                'Melalui penempatan kerja atau magang',
                'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
                'Lainnya'
            ], $this->faker->numberBetween(1, 5), true),
            'pekerjaan_anda' => $this->faker->randomElement(['Belum Bekerja', 'Karyawan Swasta/Staff', 'Wirausaha/Pemilik Usaha', 'First Line Management/Eselon IV', 'Middle Line Management/Eselon III', 'Top Management/Eselon I dan Eselon II', 'Guru', 'Dosen', 'Melanjutkan Pendidikan']),
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => $this->faker->randomElement(['Kurang dari 6 bulan', '6 Bulan - 1 Tahun', 'Lebih dari 1 Tahun', 'Sedang Wirausaha']),
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => $this->faker->randomElement(['Kurang dari 3 Juta', '3 - 5 Juta', '5 – 8 Juta', '8 – 10 Juta', 'Lebih dari 10 Juta']),
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => $this->faker->randomElement(['Instansi Pemerintah', 'Organisasi non-profit/Lembaga Swadaya Masyarakat', 'Perusahaan swasta', 'Wiraswasta/Bekerja Sendiri', 'BUMN/BUMD', 'Institusi/Organisasi multilateral', 'Lainnya']),
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => $this->faker->randomElement(['Sangat Sesuai', 'Sesuai','Netral','Kurang Sesuai','Tidak Sesuai']),
            'nama_perusahaan_instansi_tempat_anda_bekerja' => $this->faker->optional()->company,
            'provinsi_tempat_kerja' => $this->faker->optional()->state,
            // 'kabupaten_kota_tempat_kerja' => $this->faker->optional()->city,
            'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => $this->faker->randomElement(['Setingkat lebih tinggi', 'Tingkat yang sama', 'Setingkat lebih rendah', 'Tidak perlu pendidikan tinggi']),
            // 'dari_tahun_lulus_mendapatkan_ijazah_berapa_lama_anda_memulai_usaha' => $this->faker->randomElement(['Kurang dari 6 bulan', '6 Bulan - 1 Tahun', 'Lebih dari 1 Tahun']),
            // 'berapa_omset_pendapatan_usaha_anda_setiap_bulan' => $this->faker->randomElement(['Kurang dari 3 Juta', '3 - 5 Juta', '5 - 10 Juta', 'Lebih dari 10 Juta']),
            // 'apa_nama_usaha_anda' => $this->faker->optional()->company,

            'studi_yang_diambil' => $this->faker->randomElement(['S2', 'S3','Tidak Mengambil Studi Lanjut']),
            'nama_program_studi_yang_diambil' => $this->faker->optional()->randomElement(['Manajemen', 'Teknik Informatika', 'Ekonomi', 'Hukum']),
            'nama_kampus' => $this->faker->company,
            
        ];
    }
}
