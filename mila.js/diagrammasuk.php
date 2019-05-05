
 <?php
$koneksi = mysqli_connect("localhost", "root", "", "db_ibazaar");
$nama    = mysqli_query($koneksi, "select count(*) jumlah_barang_masuk from tb_barangmasuk ");
$tanggal = mysqli_query($koneksi, "select count(*) jumlah_barang_transaksi from tb_jual");
 ?>

<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Data Barang</small>
</h1>
</section>
        <title>Ibazaar</title>
        <script src="Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($n = mysqli_fetch_array($nama)) { echo '"' . $n['jumlah_barang_masuk'] . '",';}?>],
                    datasets: [{
                            label: 'Data Barang Terbanyak',
                            data: [<?php while ($t = mysqli_fetch_array($tanggal)) { echo '"' . $t['jumlah_barang_transaksi'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
    
        </script>
</div>
    </body>
</html>
