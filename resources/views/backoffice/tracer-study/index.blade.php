@extends('layouts.backoffice')

@section('title', 'Backoffice Tracer Study')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Backoffice Tracer Study</h1>
    <table class="table table-bordered" id="tracer-study-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#tracer-study-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('backoffice.tracer-study.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nim', name: 'nim' },
            { data: 'nama', name: 'nama' },
            { data: 'jenis_kelamin', name: 'jenis_kelamin' },
            { data: 'asal_prodi', name: 'asal_prodi' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
