<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Menggunakan Google Fonts untuk font lebih estetis -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>


<body>
    <div class="container">
        <div class="menu-bar">
            <div class="menu-item">
                <a href="pilih-beasiswa.php">Pilih Beasiswa</a>
            </div>
            <div class="menu-item active">
                <a href="index.php">Daftar</a>
            </div>
            <div class="menu-item">
                <a href="hasil.php">Hasil</a>
            </div>
        </div>

        <h4 class="form-title">DAFTAR BEASISWA</h4>
        <div class="card-title">Registrasi Beasiswa</div>
        <div class="form-container">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <!-- Menampilkan pesan error atau sukses jika ada -->
                <?php if (isset($_SESSION['errors'])): ?>
                    <div class="error-messages">
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error-message">
                        <p><?php echo $_SESSION['error']; ?></p>
                        <?php unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <div class="form-grid">
                    <div class="form-item">
                        <label class="form-label" for="nama">Masukkan Nama</label>
                        <input class="form-input" type="text" name="nama" id="nama" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label" for="email">Masukkan Email</label>
                        <input class="form-input" type="email" name="email" id="email" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label" for="nomor_hp">Nomor HP</label>
                        <input class="form-input" type="number" name="nomor_hp" id="nomor_hp" required maxlength="12">
                    </div>

                    <div class="form-item">
                        <label class="form-label" for="semester">Semester saat ini</label>
                        <select class="form-select" name="semester" id="semester" required onchange="updateIPK()">
                            <option value="">-- pilih semester --</option>
                            <?php
                            for ($i = 1; $i <= 8; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-item">
                        <label class="form-label" for="ipk">IPK terakhir</label>
                        <input class="form-input" type="text" name="calculated_ipk" id="calculated_ipk" value="" disabled>
                    </div>

                    <div class="form-item">
                        <label class="form-label" for="beasiswa">Pilihan Beasiswa</label>
                        <select class="form-select" name="beasiswa" id="beasiswa" required>
                            <option value="beasiswa_kip" <?php echo isset($_GET['beasiswa']) && $_GET['beasiswa'] == 'beasiswa_kip' ? 'selected' : ''; ?>>Beasiswa KIP</option>
                            <option value="beasiswa_akademik" <?php echo isset($_GET['beasiswa']) && $_GET['beasiswa'] == 'beasiswa_akademik' ? 'selected' : ''; ?>>Beasiswa Akademik</option>
                            <option value="beasiswa_non_akademik" <?php echo isset($_GET['beasiswa']) && $_GET['beasiswa'] == 'beasiswa_non_akademik' ? 'selected' : ''; ?>>Beasiswa Non-Akademik</option>
                        </select>
                    </div>


                    <div class="form-item">
                        <label class="form-label" for="berkas">Upload Berkas Syarat</label>
                        <input class="form-input" type="file" name="berkas" id="berkas">
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="form-button form-input" name="submit">Daftar</button>
                    <button type="button" class="form-button cancel" onclick="window.location.href='pilih-beasiswa.php'">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateIPK() {
            var semesterSelect = document.getElementById("semester");
            var ipkInput = document.getElementById("calculated_ipk");

            if (semesterSelect.value >= 4) {
                ipkInput.value = "3.4";
            } else {
                ipkInput.value = "2.9";
            }

            checkIPK();
        }

        function checkIPK() {
            var ipk = parseFloat(document.getElementById("calculated_ipk").value);
            var beasiswaSelect = document.getElementById("beasiswa");
            var berkasInput = document.getElementById("berkas");
            var daftarButton = document.querySelector('button[name="submit"]');

            if (ipk < 3) {
                beasiswaSelect.disabled = true;
                berkasInput.disabled = true;
                daftarButton.disabled = true;
                beasiswaSelect.classList.add('disabled-hover');
                berkasInput.classList.add('disabled-hover');
                daftarButton.classList.add('disabled-hover');
            } else {
                beasiswaSelect.disabled = false;
                berkasInput.disabled = false;
                daftarButton.disabled = false;
                beasiswaSelect.classList.remove('disabled-hover');
                berkasInput.classList.remove('disabled-hover');
                daftarButton.classList.remove('disabled-hover');
                beasiswaSelect.focus();
            }
        }

        window.onload = function () {
            updateIPK();
            checkIPK();
        };

        <?php if (isset($_SESSION['errors']) || isset($_SESSION['error'])): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : "Ada beberapa kesalahan yang perlu diperbaiki!"; ?>',
            });
        <?php endif; ?>
    </script>
</body>

</html>
