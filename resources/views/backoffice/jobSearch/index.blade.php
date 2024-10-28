@extends('layouts.app')

@section('content')

    <x-data-table 
        :headers="['ID', 'Title', 'Description','Content']" 
        :records="$jobs"
        title="Data Lowongan Pekerjaan"
        searchRoute="jobs.index"
        createRoute="jobs.create"
        editRoute="jobs.edit"
        deleteRoute="jobs.destroy"
    />
@endsection