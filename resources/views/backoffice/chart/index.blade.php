@extends('layouts.app')
@section('content')
    <div style="display: flex; flex-direction: column; row-gap: 50px;">
        @foreach ($data as $question => $item)
            <div>
                <h2 class="mytabletitle">{{ ucfirst(str_replace('_', ' ', $question)) }}</h2>
                @component('components.data-table-chart', ['data' => $item['counts']])
                @endcomponent

                <div style="margin-top: 0.5em; margin-left: 0.4em;">
                    <p>Chart Type : {{ $item['chartType'] }}</p>
                    <p>Label : {{ $item['customLabel'] }}</p>
                </div>

                {{-- @component('components.chart', [
    'chartType' => $item['chartType'],
    'data' => $item['counts'],
    'chartId' => $question . 'Chart',
    'label' => $item['customLabel'],
])
            @endcomponent --}}
            </div>
        @endforeach
    </div>
@endsection
