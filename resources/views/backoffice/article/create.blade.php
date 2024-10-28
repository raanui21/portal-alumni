@extends('layouts.app')

@section('content')
    <x-dynamic-form
        :action="route('article.store')" 
        methode="POST"
        title="create article"
        :fields="[
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true ],
            ['name' => 'image_path', 'label' => 'image_path', 'type' => 'text', 'required' => true ],
            ['name' => 'detail', 'label' => 'detail', 'type' => 'text', 'required' => true ],
            ['name' => 'content', 'label' => 'Content', 'type' => 'textarea', 'required' => true],
        ]"
    />
@endsection
