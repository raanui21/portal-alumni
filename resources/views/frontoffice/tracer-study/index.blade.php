@extends('layouts.master')

@section('title', 'Alumni')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4"><b>Tracer Study</b></h1>
        <div class="card-tracer-study mb-5">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('tracer-study.create') }}">
                    @csrf
                    <!-- Informasi Pribadi: NIM, Jenis Kelamin, Program Studi -->
                    <h4 class="mt-4 custom-heading mb-4">Data Biodata</h4>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="{{ $user->nim }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                    value="{{ $user->jenis_kelamin ?? $user->jenis_kelamin }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="program_studi">Program Studi</label>
                                <input type="text" class="form-control" id="asal_prodi" name="program_studi"
                                    value="{{ $user->asal_prodi ?? $user->jurusan }}" readonly />
                            </div>
                        </div>
                    </div>

                    <!-- Nama dan Agama -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $user->nama }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama"
                                    value="{{ $user->agama ?? '' }}" readonly />
                            </div>
                        </div>
                    </div>

                    <!-- No. HP dan Email -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No. Telepon</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="+62"
                                    value="{{ $user->no_hp ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="example@untirta.ac.id" value="{{ $user->email }}" readonly />
                            </div>
                        </div>
                    </div>

                    <!-- Data Wisuda -->
                    <h4 class="mt-4 custom-heading mb-4">Data Wisuda</h4>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <select class="form-control" id="tahun_masuk" name="tahun_masuk" required>
                                    @for ($year = 2000; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}"
                                            {{ ($user->survey->tahun_masuk ?? '') == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_lulus">Tahun Lulus</label>
                                <select class="form-control" id="tahun_lulus" name="tahun_lulus" required>
                                    @for ($year = 2000; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}"
                                            {{ ($user->survey->tahun_lulus ?? '') == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pekerjaan -->
                    <h4 class="mt-4 custom-heading mb-4">Data Pekerjaan</h4>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kapan_anda_mulai_mencari_pekerjaan">Kapan anda mulai mencari pekerjaan?</label>
                                <select class="form-control" id="kapan_anda_mulai_mencari_pekerjaan"
                                    name="kapan_anda_mulai_mencari_pekerjaan" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->kapan_anda_mulai_mencari_pekerjaan) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Beberapa bulan setelah lulus"
                                        {{ ($user->survey->kapan_anda_mulai_mencari_pekerjaan ?? '') == 'Beberapa bulan setelah lulus' ? 'selected' : '' }}>
                                        Beberapa bulan setelah lulus</option>
                                    <option value="Beberapa bulan sebelum lulus"
                                        {{ ($user->survey->kapan_anda_mulai_mencari_pekerjaan ?? '') == 'Beberapa bulan sebelum lulus' ? 'selected' : '' }}>
                                        Beberapa bulan sebelum lulus</option>
                                    <option value="Belum/Tidak Mencari Kerja"
                                        {{ ($user->survey->kapan_anda_mulai_mencari_pekerjaan ?? '') == 'Belum/Tidak Mencari Kerja' ? 'selected' : '' }}>
                                        Saya Tidak Mencari Kerja</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apa_tingkat_tempat_kerja_anda">Apa tingkat tempat kerja anda?</label>
                                <select class="form-control" id="apa_tingkat_tempat_kerja_anda"
                                    name="apa_tingkat_tempat_kerja_anda" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->apa_tingkat_tempat_kerja_anda) ? 'selected' : '' }}>Pilih
                                        salah satu</option>
                                    <option value="Lokal/Wiraswasta tidak berbadan hukum"
                                        {{ ($user->survey->apa_tingkat_tempat_kerja_anda ?? '') == 'Lokal/Wiraswasta tidak berbadan hukum' ? 'selected' : '' }}>
                                        Lokal/Wiraswasta tidak berbadan hukum</option>
                                    <option value="Nasional/Wiraswasta berbadan hukum"
                                        {{ ($user->survey->apa_tingkat_tempat_kerja_anda ?? '') == 'Nasional/Wiraswasta berbadan hukum' ? 'selected' : '' }}>
                                        Nasional/Wiraswasta berbadan hukum</option>
                                    <option value="Internasional"
                                        {{ ($user->survey->apa_tingkat_tempat_kerja_anda ?? '') == 'Internasional' ? 'selected' : '' }}>
                                        Internasional</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bagaimana Anda Mencari Pekerjaan Tersebut?</label><br />
                                @php
                                    $caraMencariPekerjaanOptions = [
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
                                        'Lainnya',
                                    ];

                                    $selectedOptions = $user->survey->bagaimana_anda_mencari_pekerjaan_tersebut ?? '[]';
                                    if (is_array($selectedOptions)) {
                                        $selectedOptions = json_encode($selectedOptions);
                                    }
                                    $selectedOptions = json_decode($selectedOptions, true) ?? [];
                                @endphp
                                @foreach ($caraMencariPekerjaanOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="bagaimana_anda_mencari_pekerjaan_tersebut"
                                            name="bagaimana_anda_mencari_pekerjaan_tersebut[]"
                                            value="{{ $option }}"
                                            @if (in_array($option, $selectedOptions)) checked @endif />
                                        <label class="form-check-label"
                                            for="bagaimana_anda_mencari_pekerjaan_tersebut">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan_anda">Pekerjaan Anda?</label>
                                <select class="form-control" id="pekerjaan_anda" name="pekerjaan_anda" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->pekerjaan_anda) ? 'selected' : '' }}>Pilih salah satu
                                    </option>
                                    <option value="Belum Bekerja"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Belum Bekerja' ? 'selected' : '' }}>
                                        Belum Bekerja</option>
                                    <option value="Karyawan Swasta/Staff"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Karyawan Swasta/Staff' ? 'selected' : '' }}>
                                        Karyawan Swasta/Staff</option>
                                    <option value="Wirausaha/Pemilik Usaha"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Wirausaha/Pemilik Usaha' ? 'selected' : '' }}>
                                        Wirausaha/Pemilik Usaha</option>
                                    <option value="First Line Management/Eselon IV"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'First Line Management/Eselon IV' ? 'selected' : '' }}>
                                        First Line Management/Eselon IV</option>
                                    <option value="Middle Line Management/Eselon III"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Middle Line Management/Eselon III' ? 'selected' : '' }}>
                                        Middle Line Management/Eselon III</option>
                                    <option value="Top Management/Eselon I dan Eselon II"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Top Management/Eselon I dan Eselon II' ? 'selected' : '' }}>
                                        Top Management/Eselon I dan Eselon II</option>
                                    <option value="Guru"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Guru' ? 'selected' : '' }}>Guru
                                    </option>
                                    <option value="Dosen"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Dosen' ? 'selected' : '' }}>Dosen
                                    </option>
                                    <option value="Melanjutkan Pendidikan"
                                        {{ ($user->survey->pekerjaan_anda ?? '') == 'Melanjutkan Pendidikan' ? 'selected' : '' }}>
                                        Melanjutkan Pendidikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jarak_tahun_lulus_dan_mendapat_pekerjaan">Jarak Tahun Lulus Dan Mendapat
                                    Pekerjaan?</label>
                                <select class="form-control" id="jarak_tahun_lulus_dan_mendapat_pekerjaan"
                                    name="jarak_tahun_lulus_dan_mendapat_pekerjaan" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->jarak_tahun_lulus_dan_mendapat_pekerjaan) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Kurang dari 6 bulan"
                                        {{ ($user->survey->jarak_tahun_lulus_dan_mendapat_pekerjaan ?? '') == 'Kurang dari 6 bulan' ? 'selected' : '' }}>
                                        Kurang dari 6 bulan</option>
                                    <option value="6 Bulan - 1 Tahun"
                                        {{ ($user->survey->jarak_tahun_lulus_dan_mendapat_pekerjaan ?? '') == '6 Bulan - 1 Tahun' ? 'selected' : '' }}>
                                        6 Bulan - 1 Tahun</option>
                                    <option value="Lebih dari 1 Tahun"
                                        {{ ($user->survey->jarak_tahun_lulus_dan_mendapat_pekerjaan ?? '') == 'Lebih dari 1 Tahun' ? 'selected' : '' }}>
                                        Lebih dari 1 Tahun</option>
                                    <option value="Sedang Wirausaha"
                                        {{ ($user->survey->jarak_tahun_lulus_dan_mendapat_pekerjaan ?? '') == 'Sedang Wirausaha' ? 'selected' : '' }}>
                                        Sedang Wirausaha</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berapa_range_gaji_anda_ditempat_kerja_setiap_bulan">Berapa Range Gaji Anda
                                    Ditempat Kerja Setiap Bulan?</label>
                                <select class="form-control" id="berapa_range_gaji_anda_ditempat_kerja_setiap_bulan"
                                    name="berapa_range_gaji_anda_ditempat_kerja_setiap_bulan" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Kurang dari 3 Juta"
                                        {{ ($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan ?? '') == 'Kurang dari 3 Juta' ? 'selected' : '' }}>
                                        Kurang dari 3 Juta</option>
                                    <option value="3 - 5 Juta"
                                        {{ ($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan ?? '') == '3 - 5 Juta' ? 'selected' : '' }}>
                                        3 - 5 Juta</option>
                                    <option value="5 – 8 Juta"
                                        {{ ($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan ?? '') == '5 – 8 Juta' ? 'selected' : '' }}>
                                        5 – 8 Juta</option>
                                    <option value="8 – 10 Juta"
                                        {{ ($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan ?? '') == '8 – 10 Juta' ? 'selected' : '' }}>
                                        8 – 10 Juta</option>
                                    <option value="Lebih dari 10 Juta"
                                        {{ ($user->survey->berapa_range_gaji_anda_ditempat_kerja_setiap_bulan ?? '') == 'Lebih dari 10 Juta' ? 'selected' : '' }}>
                                        Lebih dari 10 Juta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_perusahaan_instansi_tempat_anda_bekerja">Jenis Perusahaan/Instansi Tempat
                                    Anda Bekerja?</label>
                                <select class="form-control" id="jenis_perusahaan_instansi_tempat_anda_bekerja"
                                    name="jenis_perusahaan_instansi_tempat_anda_bekerja" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Instansi Pemerintah"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Instansi Pemerintah' ? 'selected' : '' }}>
                                        Instansi Pemerintah</option>
                                    <option value="Organisasi non-profit/Lembaga Swadaya Masyarakat"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Organisasi non-profit/Lembaga Swadaya Masyarakat' ? 'selected' : '' }}>
                                        Organisasi non-profit/Lembaga Swadaya Masyarakat</option>
                                    <option value="Perusahaan swasta"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Perusahaan swasta' ? 'selected' : '' }}>
                                        Perusahaan swasta</option>
                                    <option value="Wiraswasta/Bekerja Sendiri"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Wiraswasta/Bekerja Sendiri' ? 'selected' : '' }}>
                                        Wiraswasta/Bekerja Sendiri</option>
                                    <option value="BUMN/BUMD"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'BUMN/BUMD' ? 'selected' : '' }}>
                                        BUMN/BUMD</option>
                                    <option value="Institusi/Organisasi multilateral"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Institusi/Organisasi multilateral' ? 'selected' : '' }}>
                                        Institusi/Organisasi multilateral</option>
                                    <option value="Lainnya"
                                        {{ ($user->survey->jenis_perusahaan_instansi_tempat_anda_bekerja ?? '') == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda">Apakah
                                    Pekerjaan Anda Sesuai Dengan Jurusan Dan Bidang Ilmu?</label>
                                {{-- @dd($user->survey->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_and); --}}
                                <select class="form-control"
                                    id="apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda"
                                    name="apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_anda" required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_and) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Sesuai"
                                        {{ ($user->survey->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_and ?? '') == 'Sesuai' ? 'selected' : '' }}>
                                        Sesuai</option>
                                    <option value="Tidak Sesuai"
                                        {{ ($user->survey->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_and ?? '') == 'Tidak Sesuai' ? 'selected' : '' }}>
                                        Tidak Sesuai</option>
                                    <option value="Netral"
                                        {{ ($user->survey->apakah_pekerjaan_anda_sesuai_dengan_jurusan_dan_bidang_ilmu_and ?? '') == 'Netral' ? 'selected' : '' }}>
                                        Netral</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_perusahaan_instansi_tempat_anda_bekerja">Nama Perusahaan/Instansi Tempat
                                    Anda Bekerja?</label>
                                <input type="text" class="form-control"
                                    id="nama_perusahaan_instansi_tempat_anda_bekerja"
                                    name="nama_perusahaan_instansi_tempat_anda_bekerja"
                                    value="{{ $user->survey->nama_perusahaan_instansi_tempat_anda_bekerja ?? '' }}"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi_tempat_kerja">Provinsi Tempat Kerja?</label>
                                <input type="text" class="form-control" id="provinsi_tempat_kerja"
                                    name="provinsi_tempat_kerja" value="{{ $user->survey->provinsi_tempat_kerja ?? '' }}"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini">Tingkat
                                    Pendidikan Yang Sesuai Untuk Pekerjaan Anda?</label>
                                <select class="form-control"
                                    id="tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini"
                                    name="tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini"
                                    required>
                                    <option value="" disabled
                                        {{ is_null($user->survey->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_an) ? 'selected' : '' }}>
                                        Pilih salah satu</option>
                                    <option value="Setingkat lebih tinggi"
                                        {{ ($user->survey->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_a ?? '') == 'Setingkat lebih tinggi' ? 'selected' : '' }}>
                                        Setingkat lebih tinggi</option>
                                    <option value="Tingkat yang sama"
                                        {{ ($user->survey->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_a ?? '') == 'Tingkat yang sama' ? 'selected' : '' }}>
                                        Tingkat yang sama</option>
                                    <option value="Setingkat lebih rendah"
                                        {{ ($user->survey->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_a ?? '') == 'Setingkat lebih rendah' ? 'selected' : '' }}>
                                        Setingkat lebih rendah</option>
                                    <option value="Tidak perlu pendidikan tinggi"
                                        {{ ($user->survey->tingkat_pendidikan_apa_yg_paling_tepat_sesuai_untuk_pekerjaan_a ?? '') == 'Tidak perlu pendidikan tinggi' ? 'selected' : '' }}>
                                        Tidak perlu pendidikan tinggi</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Studi Lanjut -->
                    <h4 class="mt-4 custom-heading mb-4">Data Studi Lanjut</h4>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="studi_yang_diambil">Studi Yang Diambil</label>
                                <select class="form-control" id="studi_yang_diambil" name="studi_yang_diambil">
                                    <option value="" disabled
                                        {{ is_null($user->survey->studi_yang_diambil) ? 'selected' : '' }}>Pilih salah satu
                                    </option>
                                    <option value="S2"
                                        {{ ($user->survey->studi_yang_diambil ?? '') == 'S2' ? 'selected' : '' }}>S2
                                    </option>
                                    <option value="S3"
                                        {{ ($user->survey->studi_yang_diambil ?? '') == 'S3' ? 'selected' : '' }}>S3
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_program_studi_yang_diambil">Nama Program Studi</label>
                                <input type="text" class="form-control" id="nama_program_studi_yang_diambil"
                                    name="nama_program_studi_yang_diambil"
                                    value="{{ $user->survey->nama_program_studi_yang_diambil ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lokasi_kampus">Nama Kampus</label>
                                <input type="text" class="form-control" id="nama_kampus" name="nama_kampus"
                                    value="{{ $user->survey->nama_kampus ?? '' }}" />
                            </div>
                        </div>
                    </div>

                    <!--alert-->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="alert alert-danger alert-no-bg" role="alert">
                                <b>Pastikan Semua Kolom Sudah Terisi, Selanjutnya Klik "Tombol Simpan"</b>
                            </div>
                        </div>
                    </div>

                    <!-- Button Simpan -->
                    <div class="row mb-5">
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-save">
                                <i class="fas fa-save"></i> <b>Simpan Data</b>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
