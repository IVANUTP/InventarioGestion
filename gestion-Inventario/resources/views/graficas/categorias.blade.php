 <div class="bg-white p-6 rounded-lg shadow">
     <h3 class="text-lg font-semibold mb-4">
         Categorías registradas por fecha
     </h3>
     <canvas id="categoriasChart"></canvas>
 </div>

 <script>
     const categoriasLabels = @json($categoriasPorFecha->pluck('fecha'));
     const categoriasData = @json($categoriasPorFecha->pluck('total'));

     new Chart(document.getElementById('categoriasChart'), {
         type: 'line',
         data: {
             labels: categoriasLabels,
             datasets: [{
                 label: 'Categorías registradas',
                 data: categoriasData,
                 borderColor: 'rgba(16, 185, 129, 1)',
                 backgroundColor: 'rgba(16, 185, 129, 0.3)',
                 fill: true,
                 tension: 0.3
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
