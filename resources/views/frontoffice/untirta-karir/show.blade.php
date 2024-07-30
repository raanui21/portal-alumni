@extends('layouts.master')

@section('title', 'Detail Lowongan Pekerjaan')

@section('content')
<div class="container mt-5">
  <h1 class="text-center mb-4"><b>{{ $job->title }}</b></h1>
  <div class="d-flex justify-content-center mb-4">
    @if($job->image_url)
      <img src="{{ $job->image_url }}" alt="{{ $job->title }}" class="img-fluid rounded" style="width: 200px; height: 200px;">
    @else
      <img src="{{ asset('storage/' . $job->image_path) }}" alt="{{ $job->title }}" class="img-fluid rounded" style="width: 200px; height: 200px;">
    @endif
  </div>
  <div class="text-center mb-4">
    <h5 class="mb-0"><b></b> {{ $job->category }}</h5>
  </div>
  {{-- <div class="mb-4">
    <h5 class="mb-3"><b>Description</b></h5>
    <p>{{ $job->description }}</p>
  </div> --}}
  <div class="d-flex justify-content-center">
    <div class="card" style="width: 100%; max-width: 800px; background: #F9F9F9;
border-radius: 50px;">
      <div class="card-body">
        <div class="mb-4">
          <h5 class="mb-3"><b>About the Role </b></h5>
          <p>{{ $job->about_role }}</p>
        </div>
        <div class="mb-4">
          <h5 class="mb-3"><b>If the feeling is mutual, we offer:</b></h5>
          <p>{{ $job->offers }}</p>
        </div>
        <div class="mb-4">
          <h5 class="mb-3"><b>Contact Us!</b></h5>
          <p>{{ $job->contact }}</p>
        </div>
        <div class="d-flex justify-content-center">
          <a href="{{ route('frontoffice.untirta-karir') }}" class="btn btn-primary">Kembali ke Untirta Karir</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
