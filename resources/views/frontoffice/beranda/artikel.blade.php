@extends('layouts.master')

@section('title', 'Detail Artikel')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center mb-4">
        <img src="{{ $artikel->image_url ? $artikel->image_url : asset('image/' . $artikel->image) }}" alt="{{ $artikel->title }}" class="img-fluid rounded" style="width: 1100px; height: 500px;">
    </div>
    <h1 class="text-center mb-4"><b>{{ $artikel->title }}</b></h1>
    {{-- <div class="text-center mb-4">
        <h5 class="mb-0"><b>Category:</b> {{ $artikel->category }}</h5>
    </div> --}}
    <div class="mb-4">
        <h5 class="mb-3"><b>Description</b></h5>
        <p>{{ $artikel->description }}</p>
    </div>
    <div class="mb-4">
        <h5 class="mb-3"><b>Content</b></h5>
        <p>{{ $artikel->content }}</p>
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('frontoffice.beranda') }}" class="btn btn-primary">Back to Articles</a>
    </div>
</div>
@endsection
