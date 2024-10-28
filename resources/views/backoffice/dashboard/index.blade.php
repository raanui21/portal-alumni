@extends('layouts.app')
@section('content')
    <div class="chart-container">
        <h2  class="mytabletitle">Dashboard</h2>


        {{-- <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="381" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=sindang+sari&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://textcaseconvert.com/"></a><br><a
                    href="https://timenowin.net/"></a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;

                    }
                </style><a href="https://www.mapembed.net">create map in google</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;

                    }
                </style>
            </div>
        </div> --}}

         <div id="container"></div>

        <div class="chart-grid">
            <div style="grid-column: 1 / 3; grid-row: 1 / span 2;">
                <h3>{{$data['kapan_anda_mulai_mencari_pekerjaan']['customLabel']}}</h3>
                @component('components.chart', [
                    'chartType' => $data['kapan_anda_mulai_mencari_pekerjaan']['chartType']['type'],
                    'chartOptions' => $data['kapan_anda_mulai_mencari_pekerjaan']['chartType']['options'],
                    'data' => $data['kapan_anda_mulai_mencari_pekerjaan']['counts'],
                    'chartId' => 'kapan_anda_mulai_mencari_pekerjaanChart',
                    'label' => $data['kapan_anda_mulai_mencari_pekerjaan']['customLabel'],
                ])
                @endcomponent
            </div>

            <div style="grid-column: 3 / 5;"class="tracker">
                    <h3>Survey Tracker</h3>
                    <ul>
                        <li>
                            <p>Today </p><span>{{ $dataTracker['today'] }}</span>
                        </li>
                        <li>
                            <p>This Week </p><span>{{ $dataTracker['thisWeek'] }}</span>
                        </li>
                        <li>
                            <p>This Month </p><span>{{ $dataTracker['thisMonth'] }}</span>
                        </li>
                        <li>
                            <p>Last Month </p><span>{{ $dataTracker['lastMonth'] }}</span>
                        </li>
                        <li>
                            <p>Total Filled </p><span>{{ $dataTracker['total'] }}</span>
                        </li>
                    </ul>
            </div>

            <div style=" grid-column: 3 / 5; grid-row: 2 / span 3;">
                <h3>{{$data['jenis_perusahaan_instansi_tempat_anda_bekerja']['customLabel']}}</h3>
                @component('components.chart', [
                    'chartType' => $data['jenis_perusahaan_instansi_tempat_anda_bekerja']['chartType']['type'],
                    'chartOptions' => $data['jenis_perusahaan_instansi_tempat_anda_bekerja']['chartType']['options'],
                    'data' => $data['jenis_perusahaan_instansi_tempat_anda_bekerja']['counts'],
                    'chartId' => 'jenis_perusahaan_instansi_tempat_anda_bekerjaChart',
                    'label' => $data['jenis_perusahaan_instansi_tempat_anda_bekerja']['customLabel'],
                ])
                @endcomponent
            </div>



            <div
                style="grid-column: 1 / span 2; grid-row: 3 / span 2;">
                <h3>{{ $data['jarak_tahun_lulus_dan_mendapat_pekerjaan']['customLabel']}}</h3>
                @component('components.chart', [
                    'chartType' => $data['jarak_tahun_lulus_dan_mendapat_pekerjaan']['chartType']['type'],
                    'chartOptions' => $data['jarak_tahun_lulus_dan_mendapat_pekerjaan']['chartType']['options'],
                    'data' => $data['jarak_tahun_lulus_dan_mendapat_pekerjaan']['counts'],
                    'chartId' => 'jarak_tahun_lulus_dan_mendapat_pekerjaanChart',
                    'label' => $data['jarak_tahun_lulus_dan_mendapat_pekerjaan']['customLabel'],
                ])
                @endcomponent
            </div>

            <div
                style="grid-column: 1 / span 2; grid-row: 5 / span 2; ">
                <h3>{{ $data['berapa_range_gaji_anda_ditempat_kerja_setiap_bulan']['customLabel']}}</h3>
                @component('components.chart', [
                    'chartType' => $data['berapa_range_gaji_anda_ditempat_kerja_setiap_bulan']['chartType']['type'],
                    'chartOptions' => $data['berapa_range_gaji_anda_ditempat_kerja_setiap_bulan']['chartType']['options'],
                    'data' => $data['berapa_range_gaji_anda_ditempat_kerja_setiap_bulan']['counts'],
                    'chartId' => 'berapa_range_gaji_anda_ditempat_kerja_setiap_bulanChart',
                    'label' => $data['berapa_range_gaji_anda_ditempat_kerja_setiap_bulan']['customLabel'],
                ])
                @endcomponent
            </div>

             <div
                style="grid-column: 3 / span 2; grid-row: 5 / span 3; ">
                <h3>{{ $data['apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda']['customLabel']}}</h3>
                @component('components.chart', [
                    'chartType' => $data['apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda']['chartType']['type'],
                    'chartOptions' => $data['apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda']['chartType']['options'],
                    'data' => $data['apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda']['counts'],
                    'chartId' => 'apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_andaChart',
                    'label' => $data['apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda']['customLabel'],
                ])
                @endcomponent
            </div>

        </div>


    </div>
@endsection