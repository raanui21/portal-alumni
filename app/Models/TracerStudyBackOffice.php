<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudyBackOffice extends Model
{
    use HasFactory;

    protected $table = 'tracer_studies';

    protected $fillable = [
        'user_id', 'nim', 'jenis_kelamin', 'asal_prodi', 'nama', 'agama', 'hp', 'email',
        'tahun_masuk', 'tahun_lulus', 'status', 'mulai_mencari', 'tingkat_pekerjaan', 'cara_mencari_pekerjaan',
        'pekerjaan', 'jarak_tahun_lulus', 'range_gaji', 'jenis_perusahaan', 'kesesuaian',
        'nama_perusahaan', 'provinsi_kerja', 'kabupaten_kerja', 'tingkat_pendidikan', 'studi_yang_diambil',
        'nama_institusi', 'lokasi_kampus'
    ];

    protected $casts = [
        'cara_mencari_pekerjaan' => 'array',
    ];
}
