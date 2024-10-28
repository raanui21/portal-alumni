@extends('layouts.app')

@section('content')
    <x-dynamic-form
        :action="route('article.update', $article)" 
        methode="PUT"
        title="edit article"
        :fields="[
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'value' => $article->title, 'required' => true ],
            ['name' => 'image_path', 'label' => 'image_path', 'type' => 'text', 'value'=> $article->image_path, 'required' => true ],
            ['name' => 'detail', 'label' => 'detail', 'type' => 'text','value'=> $article->detail,'required' => true ],
            ['name' => 'content', 'label' => 'Content', 'type' => 'textarea', 'value' => $article->content, 'required' => true],
        ]"
    />
@endsection
