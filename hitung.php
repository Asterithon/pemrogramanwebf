<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Multifungsi</title>
</head>
<body>
    <h1>Kalkulator Multifungsi</h1>
    <div class="menu">
        <a href="?page=hitung&op=1"><button>Hasil Bagi</button></a>
        <a href="?page=hitung&op=2"><button>Hitung Umur</button></a>
        <a href="?page=hitung&op=3"><button>Hitung Segitiga</button></a>
    </div>
    <div class="form-container">
        <?php
        $op = isset($_GET["op"]) ? $_GET["op"] : 0;
        
        switch ($op) {
            case 1:
                // hasil bagi
                $angka1 = 6;
                $angka2 = 2;
                $hasil = $angka1 % $angka2;
                echo "<h2>Hasil Bagi</h2>";
                echo "<p>$angka1 % $angka2 = $hasil</p>";
                break;
            case 2:
                // hitung umur
                echo '<h2>Hitung Umur</h2>';
                echo '<form method="POST">
                        <input type="date" name="tanggallahir" required>
                        <input type="submit" value="Hitung Umur">
                    </form>';
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["tanggallahir"])) {
                    $tanggallahir = $_POST["tanggallahir"];
                    $tahunlahir = new DateTime($tanggallahir);
                    $tahunsekarang = new DateTime();
                    $umur = $tahunlahir->diff($tahunsekarang);
                    echo "<p>Umur Anda adalah {$umur->y} tahun, {$umur->m} bulan, dan {$umur->d} hari.</p>";
                }
                break;
            case 3:
                // hitung luas segitiga
                echo '<h2>Hitung Luas Segitiga</h2>';
                echo '<form method="POST">
                        <input type="number" name="alas" placeholder="Masukkan alas" required>
                        <input type="number" name="tinggi" placeholder="Masukkan tinggi" required>
                        <input type="submit" value="Hitung">
                    </form>';
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alas"]) && isset($_POST["tinggi"])) {
                    $alas = $_POST["alas"];
                    $tinggi = $_POST["tinggi"];
                    $luas = 0.5 * $alas * $tinggi;
                    echo "<p>Hasil hitung luas segitiga adalah $luas.</p>";
                }
                break;
            default:
                echo "<p>Silakan pilih salah satu menu di atas.</p>";
        }
        ?>
    </div>
</body>
</html>
