@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="background-image"></div>
<div class="container" style="margin-top:140px;">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mt-5" style="font-size:50px;"><b>Selamat Datang <br> Di Portal Alumni</b></h1>
            <p style="font-size:16px;">Platform digital ini menghubungkan lulusan, memfasilitasi<br> komunikasi, dan menyediakan informasi bermanfaat bagi<br> alumni.</p>
            <a href="/frontoffice/tracer-study" class="btn btn-primary mt-4" style="border-radius: 20px; padding: 10px 20px; font-size: 16px; background-color:#379DE8;">Kuisioner</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('image/team.png') }}" class="img-fluid" alt="Beranda">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1><b>Lowongan Pekerjaan</b></h1>
            <hr>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($jobs->chunk(3) as $chunk)
            <div class="item">
              <div class="row">
                @foreach($chunk as $job)
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                      <div class="d-flex align-items-center mb-3">
                        @if($job->image_url)
                          <img src="{{ $job->image_url }}" alt="{{ $job->title }}" class="img-fluid me-3" style="width: 60px; height: 60px; border-radius:50%;">
                        @else
                          <img src="{{ asset('storage/' . $job->image_path) }}" alt="{{ $job->title }}" class="img-fluid rounded-circle me-3" style="width: 60px; height: 60px;">
                        @endif
                        <div>
                          <h5 class="card-title mb-0"><b>{{ $job->title }}</b></h5>
                          <p class="card-text"><small>{{ $job->category }}</small></p>
                        </div>
                      </div>
                      <p class="card-text flex-grow-1">{{ Str::limit($job->description, 100) }}</p>
                      <a href="{{ route('frontoffice.untirta-karir.show', $job->id) }}" class="stretched-link">Lihat Detail</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endforeach
          </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1><b>Artikel</b></h1>
        </div>
        @foreach($artikels as $artikel)
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card" style="border-radius: 10px; display: flex; flex-direction: column; justify-content: space-between; margin-top:20px;">
                @if($artikel->image_url)
                    <img src="{{ $artikel->image_url }}" class="card-img-top article-image" alt="Artikel">
                @else
                    <img src="{{ asset('image/' . $artikel->image) }}" class="card-img-top article-image" alt="Artikel">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 30px;"><b>{{ $artikel->title }}</b></h5>
                    <p class="card-text" style="font-size: 17px;">{{ Str::limit($artikel->description, 100) }}</p>
                    <a href="{{ route('frontoffice.artikel.show', $artikel->id) }}" >Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.background-image {
  position: absolute;
  top: 0;
  right: 0;
  width: 75%;
  height: 100%;
  background: url('{{ asset('image/background-beranda.png') }}') no-repeat center center;
  background-size: cover;
  z-index: -1; /* Ensure it is behind the main content */
}

@media (max-width: 768px) {
  .background-image {
    display: none;
  }
}
</style>
@endsection
