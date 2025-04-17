<h1>Program upload</h1>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" id="" placeholder="masukan nama" required><br>
    <input type="file" name="upload" id="" required><br>
    <button type="submit" name="submit"> upload disini </button>
</form>


<br>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);

    if (move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file)){
        echo "File " . htmlspecialchars(basename($_FILES["upload"]["name"])) . " telah berhasil diunggah.";
    }
    else {
        echo $_FILES['error'];

    }
}

$folder = 'upload/'; // Ganti dengan path folder Anda
echo '<div style="display: flex; flex-wrap: wrap;">'; // Mengatur tampilan gambar

// Ambil semua file gambar dari folder
$images = glob($folder . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

// Cek apakah ada gambar yang ditemukan

    foreach ($images as $image) {
        echo '<div style="margin: 10px;">';
        echo '<img src="' . $image . '" alt="Image" style="max-width: 200px; max-height: 200px;"/>'; // Menampilkan gambar
        echo '</div>';
    }
    echo '</div>';



?>