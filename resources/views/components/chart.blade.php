
  
        <canvas id="{{ $chartId }}"></canvas>
    



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('{{ $chartId }}');
        new Chart(ctx, {
            type: '{{$chartType}}',
            data: {
                labels: @json($data->pluck('label')),
                datasets: [{
                    label: '{{ $label }}',
                    data: @json($data->pluck('count')),
                    borderWidth: 1
                    
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
