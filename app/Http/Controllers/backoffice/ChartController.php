<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getSurveyCounts($column)
    {
        // Check if the column type is JSON
        $isJsonColumn = $column === 'bagaimana_anda_mencari_pekerjaan_tersebut';

        $columns= [
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
        ];
        if ($isJsonColumn) {
            return
            Survey::select(DB::raw("json_array_elements_text($column::json) as label"))
            ->selectRaw('count(*) as count')
            ->groupBy(DB::raw("json_array_elements_text($column::json)"))
            ->get();
        } else {
            return Survey::select("$column as label")
            ->selectRaw('count(*) as count')
            ->groupBy($column)
                ->get();
        }
    }
    public function index()
    {
        $questions = [
            'kapan_anda_mulai_mencari_pekerjaan' => ['chartType' => 'bar', 'customLabel' => 'Custom Label 1'],
            'apa_tingkat_tempat_kerja_anda' => ['chartType' => 'pie', 'customLabel' => 'Custom Label 2'],
            // 'bagaimana_anda_mencari_pekerjaan_tersebut' => ['chartType' => 'line', 'customLabel' => 'Custom Label 3'],
            'pekerjaan_anda' => ['chartType' => 'bar', 'customLabel' => 'Custom Label 1'],
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => ['chartType' => 'line', 'customLabel' => 'Custom Label 1'],
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => ['chartType' => 'bar', 'customLabel' => 'Range Gaji Alumni'],
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => ['chartType' => 'bar', 'customLabel' => 'Custom Label 1'],
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => ['chartType' => 'doughnut', 'customLabel' => 'Custom Label 1'],
            'tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini' => ['chartType' => 'bar', 'customLabel' => 'Custom Label 1'],
            'studi_yang_diambil' => ['chartType' => 'bar', 'customLabel' => 'Custom Label 1'],
        ];

        $data = [];
        foreach ($questions as $question => $chartData) {
            $data[$question] = [
                'counts' => $this->getSurveyCounts($question),
                'chartType' => $chartData['chartType'],
                'customLabel' => $chartData['customLabel'],
            ];
        }

        return view("backoffice.chart.index", compact("data"));
    }

}
