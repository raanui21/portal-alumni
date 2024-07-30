@extends('layouts.master')

@section('title', 'Untirta Karir')

@section('content')
<div class="container mt-5">
  <h1 class="text-center mb-4"><b>Untirta Karir</b></h1>
  <p class="text-center">Platform resmi Universitas Sultan Ageng Tirtayasa (Untirta)<br> yang dirancang untuk membantu alumni, dan profesional muda<br>dalam meraih karir impian.</p>
  <div class="d-flex justify-content-center mb-5">
    <img class="img-fluid" src="{{ asset('image/untirta-karir.png') }}" alt="Untirta Karir"/>
  </div>
  
  <!-- Lowongan Pekerjaan -->
  <h1 class="text-center mb-4"><b>Lowongan Pekerjaan</b></h1>
  <div class="owl-carousel owl-theme">
    @foreach($jobs->chunk(6) as $chunk)
    <div class="item">
      <div class="row">
        @foreach($chunk as $job)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card equal-card">
            <div class="card-body d-flex flex-column">
              <div class="d-flex align-items-center mb-3">
                @if($job->image_url)
                  <img src="{{ $job->image_url }}" alt="{{ $job->title }}" class="img-fluid rounded-circle me-3" style="width: 80px; height: 80px;">
                @else
                  <img src="{{ asset('storage/' . $job->image_path) }}" alt="{{ $job->title }}" class="img-fluid rounded-circle me-3" style="width: 80px; height: 80px;">
                @endif
                <div>
                  <h5 class="card-title mb-0"><b>{{ $job->title }}</b></h5>
                  <p class="card-text"><small>{{ $job->category }}</small></p>
                </div>
              </div>
              <p class="card-text flex-grow-1">{{ $job->description }}</p>
              <a href="{{ route('frontoffice.untirta-karir.show', $job->id) }}" class="stretched-link">View Integration</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
  <!-- End Lowongan Pekerjaan -->
</div>
@endsection
