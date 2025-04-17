<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container">
        <?php
        class Mahasiswa {
            private $nama;
            private $nim;
            private $prodi;
            private $mataKuliah = array();

            public function __construct($nama, $nim, $prodi) {
                $this->nama = $nama;
                $this->nim = $nim;
                $this->prodi = $prodi;
            }

            public function tambahMataKuliah($kode, $nama, $sksTeori, $sksPraktek, $prodimk) {
                if ($prodimk == $this->prodi) {
                    $this->mataKuliah[] = array(
                        'kode' => $kode,
                        'nama' => $nama,
                        'sks_teori' => $sksTeori,
                        'sks_praktek' => $sksPraktek,
                        'prodi' => $prodimk
                    );
                }
            }

            public function tampilkanData() {
                echo "<div class='info'>";
                echo "<h1>Data Mahasiswa</h1>";
                echo "<p><strong>Nama:</strong> " . $this->nama . "</p>";
                echo "<p><strong>NIM:</strong> " . $this->nim . "</p>";
                echo "<p><strong>Prodi:</strong> " . $this->prodi . "</p>";
                echo "</div>";

                echo "<h2>Mata Kuliah yang Diambil</h2>";
                echo "<table>";
                echo "<tr><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS Teori</th><th>SKS Praktek</th></tr>";
                foreach ($this->mataKuliah as $mk) {
                    echo "<tr>";
                    echo "<td>" . $mk['kode'] . "</td>";
                    echo "<td>" . $mk['nama'] . "</td>";
                    echo "<td>" . $mk['sks_teori'] . "</td>";
                    echo "<td>" . $mk['sks_praktek'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        // Membuat objek mahasiswa
        $mahasiswa1 = new Mahasiswa("Bintang", "12345678", "teknik informatika");
        $mahasiswa2 = new Mahasiswa("Asterithon", "87654321", "informatika");

        // Menambah mata kuliah
        $mahasiswa1->tambahMataKuliah("IF101", "Pemrograman Dasar", 3, 2, "teknik informatika");
        $mahasiswa1->tambahMataKuliah("IF102", "Basis Data", 3, 2, "teknik informatika");
        $mahasiswa1->tambahMataKuliah("IF104", "Desain Web", 3, 2, "teknik informatika");

        $daftarMahasiswa = array($mahasiswa1, $mahasiswa2);

        // Menampilkan data masing-masing mahasiswa
        foreach ($daftarMahasiswa as $mahasiswa) {
            $mahasiswa->tampilkanData();
            echo "<br>";
        }
        ?>
    </div>
</body>
</html>
