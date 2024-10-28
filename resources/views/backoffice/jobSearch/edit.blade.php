@extends('layouts.app')

@section('content')
    <x-dynamic-form
        :action="route('jobs.update', $job)" 
        methode="PUT"
        title="edit lowongan pekerjaan"
        :fields="[
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'value' => $job->title, 'required' => true ],
            ['name' => 'image_path', 'label' => 'Image Path', 'type' => 'text', 'value'=>$job->image_path, 'required' => true ],
            ['name' => 'description', 'label' => 'Description', 'type' => 'text','value' => $job->description,  'required' => true ],
            ['name' => 'content', 'label' => 'Content', 'type' => 'textarea', 'value' => $job->content, 'required' => true],
        ]"
    />
@endsection
