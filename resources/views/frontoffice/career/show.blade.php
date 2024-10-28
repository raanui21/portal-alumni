@extends('layouts.master')

@section('title', 'Detail Lowongan Pekerjaan')

@section('content')
<div class="container mt-5">
  <h1 class="text-center mb-4"><b>{{ $job->title }}</b></h1>
  <div class="d-flex justify-content-center mb-4">
    @if($job->image_path)
      <img src="{{ $job->image_path }}" alt="{{ $job->title }}" class="img-fluid rounded" style="width: 200px; height: 200px;">
    @else
      <img src="{{ asset('storage/' . $job->image_path) }}" alt="{{ $job->title }}" class="img-fluid rounded" style="width: 200px; height: 200px;">
    @endif
  </div>
  {{-- <div class="text-center mb-4">
    <h5 class="mb-0"><b>Category:</b> {{ $job->category }}</h5>
  </div> --}}
  <div class="mb-4">
    {!! $job->content !!}
  </div>
  <div class="d-flex justify-content-center">
    <a href="{{ route('career.index') }}" class="btn btn-primary">Kembali ke Untirta Karir</a>
  </div>
</div>
@endsection
