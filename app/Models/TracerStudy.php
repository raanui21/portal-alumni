<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'jenis_kelamin',
        'asal_prodi',
        'nama',
        'agama',
        'hp',
        'email',
        'tahun_masuk',
        'tahun_lulus',
        'mulai_mencari',
        'tingkat_pekerjaan',
        'cara_mencari_pekerjaan',
        'pekerjaan',
        'jarak_tahun_lulus',
        'range_gaji',
        'jenis_perusahaan',
        'kesesuaian',
        'nama_perusahaan',
        'provinsi_kerja',
        'kabupaten_kerja',
        'tingkat_pendidikan',
        'studi_yang_diambil',
        'nama_institusi',
        'lokasi_kampus',
    ];

    protected $casts = [
        'cara_mencari_pekerjaan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
