<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            // 'nama' => $this->nama,
            // 'nim' => $this->nim,
            // 'fakultas' => $this->fakultas,
            // 'program_studi' => $this->program_studi,
            // 'jenis_kelamin' => $this->jenis_kelamin,
            // 'email_kampus' => $this->email_kampus,
            // 'email_pribadi' => $this->email_pribadi,
            // 'no_hp' => $this->no_hp,
            'tahun_masuk' => $this->tahun_masuk,
            'tahun_lulus' => $this->tahun_lulus,
            'kapan_anda_mulai_mencari_pekerjaan' => $this->kapan_anda_mulai_mencari_pekerjaan,
            'apa_tingkat_tempat_kerja_anda' => $this->apa_tingkat_tempat_kerja_anda,
            'bagaimana_anda_mencari_pekerjaan_tersebut' => $this->bagaimana_anda_mencari_pekerjaan_tersebut,
            'pekerjaan_anda' => $this->pekerjaan_anda,
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => $this->jarak_tahun_lulus_dan_mendapat_pekerjaan,
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => $this->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan,
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => $this->jenis_perusahaan_instansi_tempat_anda_bekerja,
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => $this->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda,
            'nama_perusahaan_instansi_tempat_anda_bekerja' => $this->nama_perusahaan_instansi_tempat_anda_bekerja,
            'provinsi_tempat_kerja' => $this->provinsi_tempat_kerja,
            'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => $this->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini,
            'studi_yang_diambil' => $this->studi_yang_diambil,
            'nama_program_studi_yang_diambil' => $this->nama_program_studi_yang_diambil,
            'nama_kampus' => $this->nama_kampus,
        ];
    }
}
