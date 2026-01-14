<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">
        Productos registrados por fecha
    </h3>
    <canvas id="productosChart"></canvas>
</div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        const productosLabels = @json($productosPorFecha->pluck('fecha'));
        const productosData = @json($productosPorFecha->pluck('total'));

        new Chart(document.getElementById('productosChart'), {
            type: 'bar',
            data: {
                labels: productosLabels,
                datasets: [{
                    label: 'Productos registrados',
                    data: productosData,
                    backgroundColor: 'rgba(79, 70, 229, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

</script>
