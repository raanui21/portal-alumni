@extends('layouts.app')

@section('content')
    <x-data-table 
        :headers="['ID', 'Title', 'Content']" 
        :records="$articles"
        title="Data Article"
        searchRoute="article.index"
        createRoute="article.create"
        editRoute="article.edit"
        deleteRoute="article.destroy"
    />
@endsection
