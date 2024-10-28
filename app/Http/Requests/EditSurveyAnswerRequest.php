<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class EditSurveyAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Biodata
            'nama' => ['nullable', 'string'],
            'nim' => ['nullable', 'integer', 'unique:surveys,nim'],
            'fakultas' => ['nullable', 'string'],
            'program_studi' => ['nullable', 'string'],
            'jenis_kelamin' => ['nullable', 'in:Laki-Laki,Perempuan'],
            'email_kampus' => ['nullable', 'email', 'unique:surveys,email_kampus'],
            'email_pribadi' => ['nullable', 'email', 'unique:surveys,email_pribadi'],
            'no_hp' => ['nullable', 'numeric'],

            // Data Wisuda
            'tahun_masuk' => ['nullable', 'numeric'],
            'tahun_lulus' => ['nullable', 'numeric'],

            // Data Pekerjaan
            'kapan_anda_mulai_mencari_pekerjaan' => ['nullable', 'in:Beberapa bulan setelah lulus,Beberapa bulan sebelum lulus,Saya Tidak Mencari Kerja'],
            'apa_tingkat_tempat_kerja_anda' => ['nullable', 'in:Lokal/Wiraswasta tidak berbadan hukum,Nasional/Wiraswasta berbadan hukum,Internasional'],
            'bagaimana_anda_mencari_pekerjaan_tersebut' => ['nullable', 'array', 'distinct', 'in:Melalui iklan di koran/majalah, brosur,Melamar ke perusahaan tanpa mengetahui lowongan yang ada,Pergi ke bursa/pameran kerja,Mencari lewat internet/iklan online/milis,Dihubungi oleh perusahaan,Menghubungi Kemenakertrans,Menghubungi agen tenaga kerja komersial/swasta,Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas,Menghubungi kantor kemahasiswaan/hubungan alumni,Membangun jejaring (network) sejak masih kuliah,Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.),Membangun bisnis sendiri,Melalui penempatan kerja atau magang,Bekerja di tempat yang sama dengan tempat kerja semasa kuliah,Lainnya'],
            'pekerjaan_anda' => ['nullable', 'in:Belum Bekerja,Karyawan Swasta/Staff,Wirausaha/Pemilik Usaha,First Line Management/Eselon IV,Middle Line Management/Eselon III,Top Management/Eselon I dan Eselon II,Guru,Dosen,Melanjutkan Pendidikan'],
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => ['nullable', 'in:Kurang dari 6 bulan,6 Bulan - 1 Tahun,Lebih dari 1 Tahun,Sedang Wirausaha'],
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => ['nullable', 'in:Kurang dari 3 Juta,3 - 5 Juta,5 – 8 Juta,8 – 10 Juta,Lebih dari 10 Juta'],
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => ['nullable', 'in:Instansi Pemerintah,Organisasi non-profit/Lembaga Swadaya Masyarakat,Perusahaan swasta,Wiraswasta/Bekerja Sendiri,BUMN/BUMD,Institusi/Organisasi multilateral,Lainnya'],
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => ['nullable', 'in:Sesuai,Tidak Sesuai,Netral'],
            'nama_perusahaan_instansi_tempat_anda_bekerja' => ['nullable', 'string'],
            'provinsi_tempat_kerja' => ['nullable', 'string'],
            'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => ['nullable', 'in:Setingkat lebih tinggi,Tingkat yang sama,Setingkat lebih rendah,Tidak perlu pendidikan tinggi'],

            // Data Studi
            'studi_yang_diambil' => ['nullable', 'in:S2,S3'],
            'nama_program_studi_yang_diambil' => ['nullable', 'string'],
            'nama_kampus' => ['nullable', 'string'],

        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
