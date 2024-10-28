<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    {{-- <script src="public\assets\vendor\ckeditor5\build\ckeditor.js"></script> --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js', 'public/assets/vendor/ckeditor5/build/ckeditor.js']) --}}
    <title>App Name - @yield('title')</title>
</head>

<body>

    @auth
        @section('sidebar')
            <x-sidebar></x-sidebar>
        @show
    @endauth
    
    <div class="main-content">
       
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const csrfToken = "{{ csrf_token() }}";
            const uploadUrl = "/ckeditor/upload?_token=" + csrfToken;

            ClassicEditor.create(document.querySelector("#editor"), {

                ckfinder: {
                    uploadUrl: uploadUrl,
                },
            }).catch((error) => {
                console.error(error);
            });

        });
    </script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script>
        (async () => {

    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
    ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
    const data = [
        ['id-3700', 10], ['id-ac', 11], ['id-jt', 12], ['id-be', 13],
        ['id-bt', 14], ['id-kb', 15], ['id-bb', 16], ['id-ba', 17],
        ['id-ji', 18], ['id-ks', 19], ['id-nt', 20], ['id-se', 21],
        ['id-kr', 22], ['id-ib', 23], ['id-su', 24], ['id-ri', 25],
        ['id-sw', 26], ['id-ku', 27], ['id-la', 28], ['id-sb', 29],
        ['id-ma', 30], ['id-nb', 31], ['id-sg', 32], ['id-st', 33],
        ['id-pa', 34], ['id-jr', 35], ['id-ki', 36], ['id-1024', 37],
        ['id-jk', 38], ['id-go', 39], ['id-yo', 40], ['id-sl', 41],
        ['id-sr', 42], ['id-ja', 43], ['id-kt', 44]
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: topology
        },

        title: {
            text: 'Highcharts Maps basic demo'
        },

        subtitle: {
            text: 'Source map: <a href="https://code.highcharts.com/mapdata/countries/id/id-all.topo.json">Indonesia</a>'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
               min: 0,
            minColor: '#FFE5E5',
            maxColor: '#FF0000'
        },

        series: [{
            data: data,
            name: 'Random data',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }]
    });

})();

    </script>
</body>


</html>
