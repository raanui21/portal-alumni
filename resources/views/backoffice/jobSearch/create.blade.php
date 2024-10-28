@extends('layouts.app')

@section('content')
    <x-dynamic-form
        :action="route('jobs.store')" 
        methode="POST"
        title="Create Lowongan Pekerjaan"
        :fields="[
            ['name' => 'title', 'label' => 'Title', 'type' => 'text',  'required' => true ],
             ['name' => 'image_path', 'label' => 'Image Path', 'type' => 'text', 'required' => true ],
            ['name' => 'description', 'label' => 'Description', 'type' => 'text',  'required' => true ],
            ['name' => 'content', 'label' => 'Content', 'type' => 'textarea',  'required' => true],
        ]"
    />
@endsection
