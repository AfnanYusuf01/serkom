<?php
session_start();
include 'conn.php';

// Konfigurasi pagination
$limit = 10; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk menghitung total data
$totalQuery = "SELECT COUNT(*) as total FROM data_beasiswa";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];

// Hitung total halaman
$totalPages = ceil($totalData / $limit);

// Query untuk mengambil data dengan limit dan offset
$query = "SELECT * FROM data_beasiswa LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn)); // Debugging jika query gagal
}

$chartData = []; // Data untuk chart
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Beasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/hasil.css">
    <style>
        
    </style>
</head>

<body>
    <div class="container">
        <div class="menu-bar">
            <div class="menu-item ">
                <a href="pilih-beasiswa.php">Pilih Beasiswa</a>
            </div>
            <div class="menu-item">
                <a href="index.php">Daftar</a>
            </div>
            <div class="menu-item active">
                <a href="hasil.php">Hasil</a>
            </div>
        </div>

        <div class="card-title-2">Hasil Beasiswa</div>
        <div class="tabel-container">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="success-message">
                    <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Pilihan Beasiswa</th>
                    <th>Nama Berkas</th>
                    <th>Status Ajuan</th>
                </tr>
                <?php
                $no = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . (isset($row['email']) ? $row['email'] : '-') . "</td>";
                    echo "<td>" . (isset($row['nomor_hp']) ? $row['nomor_hp'] : '-') . "</td>";
                    echo "<td>" . (isset($row['semester']) ? $row['semester'] : '-') . "</td>";
                    echo "<td>" . (isset($row['ipk']) ? $row['ipk'] : '-') . "</td>";
                    echo "<td>" . (isset($row['beasiswa']) ? $row['beasiswa'] : '-') . "</td>";
                    echo "<td>";
                    $fileLink = 'berkas/' . (isset($row['berkas']) ? $row['berkas'] : 'tidak-ada.pdf');
                    echo '<a href="' . $fileLink . '" class="berkas-btn" target="_blank">' . (isset($row['berkas']) ? $row['berkas'] : '-') . '</a>';
                    echo "</td>";
                    echo "<td>" . (isset($row['status_ajuan']) && $row['status_ajuan'] !== '' ? $row['status_ajuan'] : 'Belum Diverifikasi') . "</td>";
                    echo "</tr>";

                    // Tambahkan data untuk chart
                    $chartData[] = [
                        'nama' => $row['nama'],
                        'ipk' => (float) $row['ipk']
                    ];

                    $no++;
                }
                ?>
            </table>
        </div>

        <!-- Navigasi Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="hasil.php?page=<?php echo $page - 1; ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="hasil.php?page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="hasil.php?page=<?php echo $page + 1; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>

    <!-- Chart Section -->
<div class="chart-container">
    <canvas id="ipkChart" width="400" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chartData = <?php echo json_encode($chartData); ?>;

        const labels = chartData.map(item => item.nama);
        const ipkValues = chartData.map(item => item.ipk);

        const ctx = document.getElementById('ipkChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',  // Mengubah grafik menjadi tipe garis
            data: {
                labels: labels,
                datasets: [{
                    label: 'IPK Mahasiswa',
                    data: ipkValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',  // Warna latar belakang yang lembut
                    borderColor: 'rgba(54, 162, 235, 1)',  // Warna garis yang lebih tajam
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Titik pada grafik
                    pointRadius: 5,
                    pointHoverRadius: 7,  // Ukuran titik saat hover
                    tension: 0.4, // Membuat garis lebih lembut
                    fill: true, // Isi area di bawah garis
                    hoverBackgroundColor: 'rgba(54, 162, 235, 0.4)',  // Warna hover yang lebih gelap
                    hoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)', // Tooltip dengan latar belakang gelap
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#6a11cb',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw.toFixed(2); // Format IPK dengan 2 angka desimal
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)', // Warna grid sumbu Y
                        },
                        ticks: {
                            font: {
                                size: 14,  // Ukuran font label Y
                                weight: '600',
                                family: "'Poppins', sans-serif"
                            },
                            color: '#333' // Warna teks sumbu Y
                        }
                    },
                    x: {
                        grid: {
                            display: false,  // Menghilangkan grid pada sumbu X
                        },
                        ticks: {
                            font: {
                                size: 14,  // Ukuran font label X
                                weight: '600',
                                family: "'Poppins', sans-serif"
                            },
                            color: '#333' // Warna teks sumbu X
                        }
                    }
                }
            }
        });
    });
</script>

</body>

</html>
