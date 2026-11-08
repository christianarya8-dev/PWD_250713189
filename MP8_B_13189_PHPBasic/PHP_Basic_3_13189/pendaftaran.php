<h2>Pendaftaran Staff</h2>
<form method="POST" action="">
    <p>Nama: <br /><input type="text" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>" /></p>
    <p>NPM: <br /><input type="text" name="npm" value="<?php echo htmlspecialchars($_POST['npm'] ?? ''); ?>" /></p>
    <p>Pilihan Staff: <br />
        <select name="loker">
            <option value="">-- Pilih Staff --</option>
            <option value="kasir" <?php if(($_POST['loker'] ?? '') === 'kasir') echo 'selected'; ?>>kasir</option>
            <option value="merchandiser" <?php if(($_POST['loker'] ?? '') === 'merchandiser') echo 'selected'; ?>>merchandiser</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $npm = $_POST['npm'] ?? '';
    $loker = $_POST['loker'] ?? '';
    $errors = array();

    // Validasi tidak kosong
    if (empty($nama) || empty($npm) || empty($loker)) {
        $errors[] = "Semua bidang harus diisi.";
    }

    // Validasi nama hanya huruf dan spasi
    if (!empty($nama) && !preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    // Validasi npm hanya angka
    if (!empty($npm) && !preg_match("/^[0-9]*$/", $npm)) {
        $errors[] = "NPM hanya boleh mengandung angka.";
    }

    // Menampilkan output
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($error) . " !!</p>";
        }
    } else {
        $jadwalWawancara = "";
        if ($loker === 'kasir') {
            $jadwalWawancara = "besok pukul 10.00 WIB di market";
        } elseif ($loker === 'merchandiser') {
            $jadwalWawancara = "lusa pukul 12.00 WIB di market";
        }

        echo "<h3>Informasi Pendaftaran</h3>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>NPM:</strong> " . htmlspecialchars($npm) . "</p>";
        echo "<p><strong>Pilihan Staff:</strong> " . htmlspecialchars($loker) . "</p>";
        echo "<p><strong>Jadwal Wawancara:</strong> " . htmlspecialchars($jadwalWawancara) . "</p>";
        echo "<p>Anda mendaftar sebagai " . htmlspecialchars($loker) . ". Selanjutnya, Anda dapat hadir " . htmlspecialchars($jadwalWawancara) . " untuk wawancara.</p>";
    }
} else {
    echo "Silahkan lengkapi formulir di atas.";
}
?>