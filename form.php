<h1>Program upload</h1>
<form method="POST" enctype="multipart/form-data">
    nama : <input type="text" name="name" placeholder="masukan nama" required><br>
    username : <input type="text" name="username" placeholder="masukan nama pengguna" required><br>
    email : <input type="email" name="email" placeholder="masukan surat elektronik" required><br>
    password : <input type="password" name="password" placeholder="masukan kata kunci" required><br>
    jenis kelamin : <br><input type="radio" name="jk" value="l">Laki-laki <br><input type="radio" name="jk" value="p">Perempuan <br><br>
    agama : <select name="agama">
        <option value="hindu">hindu</option>
        <option value="budha">budha</option>
        <option value="kristen">kristen</option>
        <option value="islam">islam</option>
        <option value="konghucu">konghucu</option>
    </select><br>
    biografi : <textarea name="bio" cols="30" rows="5" placeholder="masukan biodata anda"></textarea><br>
    <input type="file" name="upload" id="" required><br>
    <button type="submit" name="submit"> Daftar </button>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $agama = $_POST["agama"];
    $bio = $_POST["bio"];
    echo "upload berhasil<br>";

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);

    if (move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file)){
        echo "File " . htmlspecialchars(basename($_FILES["upload"]["name"])) . " telah berhasil diunggah.";
    }
    else {
        echo "upload gambar gagal";

    }

}
?>