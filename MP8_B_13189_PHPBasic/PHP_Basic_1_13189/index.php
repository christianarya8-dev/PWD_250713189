<?php
    echo "<h1>Data Jurusan</h1>";
    echo '<form method="POST" action="">
        <p>Nama: <br /><input type="text" name="nama" /></p>
        <p>NPM: <br /><input type="text" name="npm" /></p>
        <p>Jurusan: <br /><input type="text" name="jurusan" /></p>
        <button type="submit">Kirim</button>
    </form>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $jurusan = $_POST['jurusan'];
        echo "Jurusan " . htmlspecialchars($nama) . " / " . htmlspecialchars($npm) . " adalah " . htmlspecialchars($jurusan);
    } else {
        echo "Silakan isi formulir di atas untuk mengirimkan data jurusan Anda.";
    }
?>