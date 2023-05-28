<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Statistik Rawat Inap & Rawat Jalan</h4>
                <hr>
                
                <canvas id="myChart" height="100"></canvas>



            </div>
        </div>
    </div>
    <!-- <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Riwayat Kunjungan</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>



            </div>
        </div>
    </div> -->
</div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chartData = <?php echo json_encode($chartData); ?>;
        var labels = [];
        var rawatJalanData = [];
        var rawatInapData = [];

        for (var i = 0; i < chartData.length; i++) {
            labels.push(chartData[i].create_date);
            rawatJalanData.push(chartData[i].rawat_jalan);
            rawatInapData.push(chartData[i].rawat_inap);
        }

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Rawat Jalan',
                    data: rawatJalanData,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Rawat Inap',
                    data: rawatInapData,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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
    </script>
