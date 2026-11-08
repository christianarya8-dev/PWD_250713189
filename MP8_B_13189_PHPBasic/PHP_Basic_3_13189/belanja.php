<h2>Belanja</h2>
<p><strong>Daftar Kategori:</strong></p>
<form method="POST" action="">
    <p>Makanan dan Minuman: <br />
        <select name="makmin">
            <option value="">-- Pilih Makanan/Minuman --</option>
            <option value="pop mie" <?php if(($_POST['makmin'] ?? '') === 'pop mie') echo 'selected'; ?>>pop mie</option>
            <option value="air mineral" <?php if(($_POST['makmin'] ?? '') === 'air mineral') echo 'selected'; ?>>air mineral</option>
        </select>
    </p>
    <p>Alat Tulis: <br />
        <select name="alat_tulis">
            <option value="">-- Pilih Alat Tulis --</option>
            <option value="pulpen" <?php if(($_POST['alat_tulis'] ?? '') === 'pulpen') echo 'selected'; ?>>pulpen</option>
            <option value="tipe-x" <?php if(($_POST['alat_tulis'] ?? '') === 'tipe-x') echo 'selected'; ?>>tipe-x</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makmin = $_POST['makmin'] ?? '';
    $alat_tulis = $_POST['alat_tulis'] ?? '';
    $errors = array();

    // Validasi tidak kosong
    if (empty($makmin) || empty($alat_tulis)) {
        $errors[] = "Makanan dan minuman serta alat tulis harus dipilih.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($error) . " !!</p>";
        }
    } else {
        // Harga makanan dan minuman
        $hargaMakmin = 0;
        if ($makmin === 'pop mie') {
            $hargaMakmin = 5000;
        } elseif ($makmin === 'air mineral') {
            $hargaMakmin = 4000;
        }

        // harga alat tulis
        $hargaAlatTulis = 0;
        if ($alat_tulis === 'pulpen') {
            $hargaAlatTulis = 2000;
        } elseif ($alat_tulis === 'tipe-x') {
            $hargaAlatTulis = 8000;
        }

        $totalBayar = $hargaMakmin + $hargaAlatTulis;

        // diskon
        function dapatDiskon($totalBayar) {
            if ($totalBayar >= 10000) {
                return 0.05;
            } else {
                return 0;
            }
        }

        // total harga akhir
        function totalHarga($diskon, $totalBayar) {
            return $totalBayar - ($totalBayar * $diskon);
        }

        $diskon = dapatDiskon($totalBayar);
        $totalAkhir = totalHarga($diskon, $totalBayar);

        // Output Informasi
        echo "<h3>Informasi Belanja</h3>";
        echo "<p><strong>Makanan dan Minuman:</strong> " . htmlspecialchars($makmin) . "</p>";
        echo "<p><strong>Alat Tulis:</strong> " . htmlspecialchars($alat_tulis) . "</p>";
        echo "<p><strong>Total Harga:</strong> Rp" . htmlspecialchars($totalAkhir) . "</p>";
        echo "<p><strong>Diskon:</strong> " . htmlspecialchars($diskon * 100) . "%</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "%.</p>";
        }
    }
} else {
    echo "Silahkan pilih produk yang ingin dibeli.";
}
?>