@extends('layouts.master')

@section('title', 'Detail Artikel')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center mb-4">
        <img src="{{ $article->image_path }}" alt="{{ $article->title }}" class="img-fluid rounded" style="width: 800px; height: 400px;">
    </div>
    <h3 class="text-center mb-4"><b>{{ $article->title }}</b></h3>
    {{-- <div class="mb-4">
        <p>{{ $article->detail }}</p>
    </div> --}}
    <div class="mb-4">
        {!! $article->content !!}
        {{-- <p>{{ $article->content }}</p> --}}
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('home.index') }}" class="btn btn-primary">Back to Articles</a>
    </div>
</div>
@endsection
