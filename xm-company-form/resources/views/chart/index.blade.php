@include('_head')

<body>
    @include('_header')
    <div class="container full-width">
        <div class="row">
            <div class="column left">
                <h2>Show Chart</h2>
            </div>
            <div class="column right">
                <h2><a href="{{ url('/company') }}">Show Table</a></h2>
            </div>
        </div>
        <canvas id="myChart"></canvas>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var labels = @json($labels);
                var highValues = @json($highValues);
                var lowValues = @json($lowValues);
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'High Values',
                            data: highValues,
                            borderColor: 'red',
                            borderWidth: 1,
                            fill: false
                        }, {
                            label: 'Low Values',
                            data: lowValues,
                            borderColor: 'blue',
                            borderWidth: 1,
                            fill: false
                        }]
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>