@extends('layouts.master')

@section('title', 'Alumni')

@section('content')
<div class="container mt-5 mb-5">
  <h1 class="text-center mb-4"><b>Tracer Study</b></h1>
  <div class="card-tracer-study mb-5">
    <div class="card-body">
      @if(session('success'))
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
      <form method="POST" action="{{ route('tracer-study.store') }}">
        @csrf
        <!-- Informasi Pribadi: NIM, Jenis Kelamin, Program Studi -->
        <h4 class="mt-4 custom-heading mb-4">Data Biodata</h4>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" value="{{ $user->nim }}" readonly />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $tracerStudy->jenis_kelamin ?? $user->jenis_kelamin }}" readonly />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="asal_prodi">Program Studi</label>
              <input type="text" class="form-control" id="asal_prodi" name="asal_prodi" value="{{ $tracerStudy->asal_prodi ?? $user->jurusan }}" readonly />
            </div>
          </div>
        </div>
    
        <!-- Nama dan Agama -->
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}" readonly />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="agama">Agama</label>
              <input type="text" class="form-control" id="agama" name="agama" value="{{ $tracerStudy->agama ?? '' }}" required />
            </div>
          </div>
        </div>
    
        <!-- No. HP dan Email -->
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <label for="hp">HP</label>
              <input type="text" class="form-control" id="hp" name="hp" placeholder="+62" value="{{ $tracerStudy->hp ?? '' }}" required />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@untirta.ac.id" value="{{ $user->email }}" required />
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
                  <option value="{{ $year }}" {{ ($tracerStudy->tahun_masuk ?? '') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tahun_lulus">Tahun Lulus</label>
              <select class="form-control" id="tahun_lulus" name="tahun_lulus" required>
                @for ($year = 2000; $year <= date('Y'); $year++)
                  <option value="{{ $year }}" {{ ($tracerStudy->tahun_lulus ?? '') == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                  <label for="mulai_mencari">Kapan anda mulai mencari pekerjaan?</label>
                  <select class="form-control" id="mulai_mencari" name="mulai_mencari" required>
                      <option value="" disabled selected>Pilih salah satu</option>
                      <option value="Beberapa bulan setelah lulus" {{ ($tracerStudy->mulai_mencari ?? '') == 'Beberapa bulan setelah lulus' ? 'selected' : '' }}>Beberapa bulan setelah lulus</option>
                      <option value="Beberapa bulan sebelum lulus" {{ ($tracerStudy->mulai_mencari ?? '') == 'Beberapa bulan sebelum lulus' ? 'selected' : '' }}>Beberapa bulan sebelum lulus</option>
                      <option value="Saya Tidak Mencari Kerja" {{ ($tracerStudy->mulai_mencari ?? '') == 'Saya Tidak Mencari Kerja' ? 'selected' : '' }}>Saya Tidak Mencari Kerja</option>
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="tingkat_pekerjaan">Apa tingkat tempat kerja anda?</label>
                  <select class="form-control" id="tingkat_pekerjaan" name="tingkat_pekerjaan" required>
                      <option value="" disabled selected>Pilih salah satu</option>
                      <option value="Lokal/Wiraswasta tidak berbadan hukum" {{ ($tracerStudy->tingkat_pekerjaan ?? '') == 'Lokal/Wiraswasta tidak berbadan hukum' ? 'selected' : '' }}>Lokal/Wiraswasta tidak berbadan hukum</option>
                      <option value="Nasional/Wiraswasta berbadan hukum" {{ ($tracerStudy->tingkat_pekerjaan ?? '') == 'Nasional/Wiraswasta berbadan hukum' ? 'selected' : '' }}>Nasional/Wiraswasta berbadan hukum</option>
                      <option value="Internasional" {{ ($tracerStudy->tingkat_pekerjaan ?? '') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
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
            'Menemukan Pekerjaan Melalui iklan Di Koran Atau Majalah , atau Lewat Brosur',
            'Mengirimkan lamaran ke perusahaan tanpa mengetahui apakah ada lowongan yang tersedia',
            'Menghadiri bursa kerja atau pameran karir.',
            'Mencari lowongan pekerjaan lewat internet, iklan online, atau milis',
            'Dihubungi langsung oleh perusahaan yang menawarkan pekerjaan.',
            'Menghubungi Kementerian Ketenagakerjaan dan Transmigrasi (Kemenakertrans).',
            'Menggunakan jasa agen tenaga kerja komersial atau swasta.',
            'Mendapatkan informasi pekerjaan dari pusat atau kantor pengembangan karir di fakultas atau universitas.',
            'Menghubungi kantor kemahasiswaan atau hubungan alumni.',
            'Membangun jaringan profesional sejak masih kuliah.',
            'Melanjutkan bekerja di perusahaan tempat bekerja saat masih kuliah.',
            'Mendapatkan pekerjaan melalui program penempatan kerja atau magang.',
            'Memulai dan mengembangkan bisnis sendiri.',
            'Memanfaatkan jaringan relasi (seperti dosen, orang tua, saudara, teman, dan lainnya).'
        ];

        // Pastikan $tracerStudy terdefinisi dan properti cara_mencari_pekerjaan terdefinisi
        $selectedOptions = [];
        if(isset($tracerStudy) && !empty($tracerStudy->cara_mencari_pekerjaan)) {
            // Decode JSON dengan pengecekan error
            $selectedOptions = json_decode($tracerStudy->cara_mencari_pekerjaan, true);
            if(json_last_error() !== JSON_ERROR_NONE) {
                $selectedOptions = [];
            }
        }
    @endphp
    @foreach ($caraMencariPekerjaanOptions as $option)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="cara_mencari_pekerjaan" name="cara_mencari_pekerjaan[]" value="{{ $option }}" 
                @if(in_array($option, $selectedOptions)) checked @endif />
            <label class="form-check-label" for="cara_mencari_pekerjaan">{{ $option }}</label>
        </div>
    @endforeach
</div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="pekerjaan">Pekerjaan Anda?</label>
              <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                <option value="Belum Bekerja" {{ ($tracerStudy->pekerjaan ?? '') == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                <option value="Karyawan Swasta/Staff" {{ ($tracerStudy->pekerjaan ?? '') == 'Karyawan Swasta/Staff' ? 'selected' : '' }}>Karyawan Swasta/Staff</option>
                <option value="Wirausaha/Pemilik Usaha" {{ ($tracerStudy->pekerjaan ?? '') == 'Wirausaha/Pemilik Usaha' ? 'selected' : '' }}>Wirausaha/Pemilik Usaha</option>
                <option value="First Line Management/Eselon IV" {{ ($tracerStudy->pekerjaan ?? '') == 'First Line Management/Eselon IV' ? 'selected' : '' }}>First Line Management/Eselon IV</option>
                <option value="Middle Line Management/Eselon III" {{ ($tracerStudy->pekerjaan ?? '') == 'Middle Line Management/Eselon III' ? 'selected' : '' }}>Middle Line Management/Eselon III</option>
                <option value="Top Management/Eselon I dan Eselon II" {{ ($tracerStudy->pekerjaan ?? '') == 'Top Management/Eselon I dan Eselon II' ? 'selected' : '' }}>Top Management/Eselon I dan Eselon II</option>
                <option value="Guru" {{ ($tracerStudy->pekerjaan ?? '') == 'Guru' ? 'selected' : '' }}>Guru</option>
                <option value="Dosen" {{ ($tracerStudy->pekerjaan ?? '') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="Melanjutkan Pendidikan" {{ ($tracerStudy->pekerjaan ?? '') == 'Melanjutkan Pendidikan' ? 'selected' : '' }}>Melanjutkan Pendidikan</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jarak_tahun_lulus">Jarak Tahun Lulus Dan Mendapat Pekerjaan?</label>
              <select class="form-control" id="jarak_tahun_lulus" name="jarak_tahun_lulus" required>
                <option value="Kurang dari 6 bulan" {{ ($tracerStudy->jarak_tahun_lulus ?? '') == 'Kurang dari 6 bulan' ? 'selected' : '' }}>Kurang dari 6 bulan</option>
                <option value="6 Bulan - 1 Tahun" {{ ($tracerStudy->jarak_tahun_lulus ?? '') == '6 Bulan - 1 Tahun' ? 'selected' : '' }}>6 Bulan - 1 Tahun</option>
                <option value="Lebih dari 1 Tahun" {{ ($tracerStudy->jarak_tahun_lulus ?? '') == 'Lebih dari 1 Tahun' ? 'selected' : '' }}>Lebih dari 1 Tahun</option>
                <option value="Sedang Wirausaha" {{ ($tracerStudy->jarak_tahun_lulus ?? '') == 'Sedang Wirausaha' ? 'selected' : '' }}>Sedang Wirausaha</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="range_gaji">Berapa Range Gaji Anda Ditempat Kerja Setiap Bulan?</label>
              <select class="form-control" id="range_gaji" name="range_gaji" required>
                <option value="Kurang dari 3 Juta" {{ ($tracerStudy->range_gaji ?? '') == 'Kurang dari 3 Juta' ? 'selected' : '' }}>Kurang dari 3 Juta</option>
                <option value="3 - 5 Juta" {{ ($tracerStudy->range_gaji ?? '') == '3 - 5 Juta' ? 'selected' : '' }}>3 - 5 Juta</option>
                <option value="5 – 8 Juta" {{ ($tracerStudy->range_gaji ?? '') == '5 – 8 Juta' ? 'selected' : '' }}>5 – 8 Juta</option>
                <option value="8 – 10 Juta" {{ ($tracerStudy->range_gaji ?? '') == '8 – 10 Juta' ? 'selected' : '' }}>8 – 10 Juta</option>
                <option value="Lebih dari 10 Juta" {{ ($tracerStudy->range_gaji ?? '') == 'Lebih dari 10 Juta' ? 'selected' : '' }}>Lebih dari 10 Juta</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_perusahaan">Jenis Perusahaan/Instansi Tempat Anda Bekerja?</label>
              <select class="form-control" id="jenis_perusahaan" name="jenis_perusahaan" required>
                <option value="Instansi Pemerintah" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Instansi Pemerintah' ? 'selected' : '' }}>Instansi Pemerintah</option>
                <option value="Organisasi non-profit/Lembaga Swadaya Masyarakat" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Organisasi non-profit/Lembaga Swadaya Masyarakat' ? 'selected' : '' }}>Organisasi non-profit/Lembaga Swadaya Masyarakat</option>
                <option value="Perusahaan swasta" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Perusahaan swasta' ? 'selected' : '' }}>Perusahaan swasta</option>
                <option value="Wiraswasta/Bekerja Sendiri" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Wiraswasta/Bekerja Sendiri' ? 'selected' : '' }}>Wiraswasta/Bekerja Sendiri</option>
                <option value="BUMN/BUMD" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'BUMN/BUMD' ? 'selected' : '' }}>BUMN/BUMD</option>
                <option value="Institusi/Organisasi multilateral" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Institusi/Organisasi multilateral' ? 'selected' : '' }}>Institusi/Organisasi multilateral</option>
                <option value="Lainnya" {{ ($tracerStudy->jenis_perusahaan ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kesesuaian">Apakah Pekerjaan Anda Sesuai Dengan Jurusan Dan Bidang Ilmu?</label>
              <select class="form-control" id="kesesuaian" name="kesesuaian" required>
                <option value="Sesuai" {{ ($tracerStudy->kesesuaian ?? '') == 'Sesuai' ? 'selected' : '' }}>Sesuai</option>
                <option value="Tidak Sesuai" {{ ($tracerStudy->kesesuaian ?? '') == 'Tidak Sesuai' ? 'selected' : '' }}>Tidak Sesuai</option>
                <option value="Netral" {{ ($tracerStudy->kesesuaian ?? '') == 'Netral' ? 'selected' : '' }}>Netral</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_perusahaan">Nama Perusahaan/Instansi Tempat Anda Bekerja?</label>
              <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $tracerStudy->nama_perusahaan ?? '' }}" required />
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="provinsi_kerja">Provinsi Tempat Kerja?</label>
              <input type="text" class="form-control" id="provinsi_kerja" name="provinsi_kerja" value="{{ $tracerStudy->provinsi_kerja ?? '' }}" required />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kabupaten_kerja">Kabupaten/Kota Tempat Kerja?</label>
              <input type="text" class="form-control" id="kabupaten_kerja" name="kabupaten_kerja" value="{{ $tracerStudy->kabupaten_kerja ?? '' }}" required />
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="tingkat_pendidikan">Tingkat Pendidikan Yang Sesuai Untuk Pekerjaan Anda?</label>
              <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                <option value="Setingkat lebih tinggi" {{ ($tracerStudy->tingkat_pendidikan ?? '') == 'Setingkat lebih tinggi' ? 'selected' : '' }}>Setingkat lebih tinggi</option>
                <option value="Tingkat yang sama" {{ ($tracerStudy->tingkat_pendidikan ?? '') == 'Tingkat yang sama' ? 'selected' : '' }}>Tingkat yang sama</option>
                <option value="Setingkat lebih rendah" {{ ($tracerStudy->tingkat_pendidikan ?? '') == 'Setingkat lebih rendah' ? 'selected' : '' }}>Setingkat lebih rendah</option>
                <option value="Tidak perlu pendidikan tinggi" {{ ($tracerStudy->tingkat_pendidikan ?? '') == 'Tidak perlu pendidikan tinggi' ? 'selected' : '' }}>Tidak perlu pendidikan tinggi</option>
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
        <option value="">-- Pilih Studi Yang Diambil --</option>
        <option value="S2" {{ ($tracerStudy->studi_yang_diambil ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
        <option value="S3" {{ ($tracerStudy->studi_yang_diambil ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="nama_institusi">Nama Institusi</label>
      <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="{{ $tracerStudy->nama_institusi ?? '' }}" />
    </div>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md-6">
    <div class="form-group">
      <label for="lokasi_kampus">Nama Kampus/Lokasi Kampus</label>
      <input type="text" class="form-control" id="lokasi_kampus" name="lokasi_kampus" value="{{ $tracerStudy->lokasi_kampus ?? '' }}" />
    </div>
  </div>
</div>
    
        <!--alert-->
        <div class="row mb-4">
          <div class="col-12">
            <div class="alert alert-danger alert-no-bg" role="alert">
              <b>Pastikan Semua Kolom Sudah Terisi, Selanjutnya Klik "Tombol Simpan</b>
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