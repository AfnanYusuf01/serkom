<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Beasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/beasiswa.css">
</head>

<body>
    <div class="container">
        <div class="menu-bar">
            <div class="menu-item active">
                <a href="pilih-beasiswa.php">Pilih Beasiswa</a>
            </div>
            <div class="menu-item">
                <a href="index.php">Daftar</a>
            </div>
            <div class="menu-item">
                <a href="hasil.php">Hasil</a>
            </div>
        </div>

        <h2 class="form-title">Pilih Beasiswa</h2>

        <div class="beasiswa-container">
            <div class="beasiswa-card" style="background-image: url('assets/img/kip.jpeg');">
                <h3>Beasiswa KIP</h3>
                <p>Diberikan kepada siswa dengan prestasi akademik yang luar biasa di tingkat nasional. Syarat: Nilai rata-rata di atas 90 dan lolos seleksi nasional.</p>
                <a href="index.php?beasiswa=beasiswa_kip">Daftar</a>
            </div>
            <div class="beasiswa-card" style="background-image: url('assets/img/akademik.jpeg');">
                <h3>Beasiswa Akademik</h3>
                <p>Dukungan penuh untuk biaya kuliah dan penelitian. Syarat: Bukti penerimaan di universitas dan rekomendasi dari dosen.</p>
                <a href="index.php?beasiswa=beasiswa_akademik">Daftar</a>
            </div>
            <div class="beasiswa-card" style="background-image: url('assets/img/images.jpeg');">
                <h3>Beasiswa Non-Akademik</h3>
                <p>Untuk siswa berbakat di bidang seni atau budaya. Syarat: Portofolio karya seni dan bukti partisipasi dalam kegiatan seni.</p>
                <a href="index.php?beasiswa=beasiswa_non_akademik">Daftar</a>
            </div>
        </div>
    </div>
</body>

</html>
