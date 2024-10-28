<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getSurveyCounts($column)
    {
        // Check if the column type is JSON
        $isJsonColumn = $column === 'bagaimana_anda_mencari_pekerjaan_tersebut';

        if ($isJsonColumn) {
            return Survey::select("$column as label")
            ->selectRaw('count(*) as count')
            ->groupBy($column)
                ->get();
        } else {
            return Survey::select("$column as label")
            ->selectRaw('count(*) as count')
            ->groupBy($column)
                ->get();
        }
    }

    private function getSurveyCountByTimeframe($timeframe)
    {
        switch ($timeframe) {
            case 'today':
                return Survey::whereDate('created_at', Carbon::today())->count();
            case 'thisWeek':
                return Survey::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
            case 'thisMonth':
                return Survey::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
            case 'lastMonth':
                return Survey::whereBetween('created_at', [
                    Carbon::now()->subMonth()->startOfMonth(),
                    Carbon::now()->subMonth()->endOfMonth()
                ])->count();
            case 'total':
                return Survey::count();
            default:
                return 0;
        }
    }

    public function index()
    {
        $data = [
            'kapan_anda_mulai_mencari_pekerjaan' => [
                'counts' => $this->getSurveyCounts('kapan_anda_mulai_mencari_pekerjaan'),
                'chartType' => ['type' => 'bar', 'options' => ['responsive' => true]],
                'customLabel' => 'Waktu Mulai Mencari Kerja'
            ],
            'jenis_perusahaan_instansi_tempat_anda_bekerja' => [
                'counts' => $this->getSurveyCounts('jenis_perusahaan_instansi_tempat_anda_bekerja'),
                'chartType' => ['type' => 'doughnut', 'options' => ['responsive' => true]],
                'customLabel' => 'Instansi Pekerjaan'
            ],
            'jarak_tahun_lulus_dan_mendapat_pekerjaan' => [
                'counts' => $this->getSurveyCounts('jarak_tahun_lulus_dan_mendapat_pekerjaan'),
                'chartType' => ['type' => 'bar', 'options' => ['responsive' => true]],
                'customLabel' => 'Waktu Tunggu'
            ],
            'berapa_range_gaji_anda_ditempat_kerja_setiap_bulan' => [
                'counts' => $this->getSurveyCounts('berapa_range_gaji_anda_ditempat_kerja_setiap_bulan'),
                'chartType' => ['type' => 'bar', 'options' => ['responsive' => true]],
                'customLabel' => 'Range Gaji Alumni'
            ],
            'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda' => [
                'counts' => $this->getSurveyCounts('apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda'),
                'chartType' => ['type' => 'doughnut', 'options' => ['responsive' => true]],
                'customLabel' => 'Kesesuaian Prodi dengan Pekerjaan'
            ]
        ];

        $todayCount = $this->getSurveyCountByTimeframe('today');
        $thisWeekCount = $this->getSurveyCountByTimeframe('thisWeek');
        $thisMonthCount = $this->getSurveyCountByTimeframe('thisMonth');
        $lastMonthCount = $this->getSurveyCountByTimeframe('lastMonth');
        $totalCount = $this->getSurveyCountByTimeframe('total');

        $dataTracker = [
            'today' => $todayCount,
            'thisWeek' => $thisWeekCount,
            'thisMonth' => $thisMonthCount,
            'lastMonth' => $lastMonthCount,
            'total' => $totalCount,
        ];

        return view("frontoffice.statistic.index", compact("data", "dataTracker"));
    }
    // public function index(Request $request)
    // {
    //     return view('frontoffice.statistic.index');
    // }
}
