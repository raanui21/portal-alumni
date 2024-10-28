<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Survey extends Model
{
    use HasFactory;

    protected $table = "surveys";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nim',
        'fakultas',
        'program_studi',
        'jenis_kelamin',
        'email_kampus',
        'email_pribadi',
        'no_hp',
        'tahun_masuk',
        'tahun_lulus',
        'kapan_anda_mulai_mencari_pekerjaan',
        'apa_tingkat_tempat_kerja_anda',
        'bagaimana_anda_mencari_pekerjaan_tersebut',
        'pekerjaan_anda',
        'jarak_tahun_lulus_dan_mendapat_pekerjaan',
        'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan',
        'jenis_perusahaan_instansi_tempat_anda_bekerja',
        'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda',
        'nama_perusahaan_instansi_tempat_anda_bekerja',
        'provinsi_tempat_kerja',
        'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini',
        'studi_yang_diambil',
        'nama_program_studi_yang_diambil',
        'nama_kampus',
    ];

    protected $casts = [
        'bagaimana_anda_mencari_pekerjaan_tersebut' => 'array'
    ];
    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class, "user_id", "id");
    }
}
