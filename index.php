<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pilihan Kasus</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
        text-align: center;
    }
    h1, h2 {
        text-align: center;
        color: #333;
    }
    .container, .menu {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .menu {
        margin-bottom: 20px;
    }
    .menu a, button {
        text-decoration: none;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
        margin: 5px;
        display: inline-block;
    }
    .menu a:hover, button:hover {
        background-color: #45a049;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 10px;
    }
    table th {
        background-color: #4caf50;
        color: white;
    }
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .form-container {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        display: inline-block;
    }
    input[type="date"], input[type="number"] {
        margin: 10px 0;
        padding: 10px;
        font-size: 16px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .footer {
        text-align: center;
        margin-top: 20px;
        color: #666;
    }
</style>
</head>
<body>
    <h1>Pilih Kasus</h1>
    <div class="menu">
        <a href="?page=hitung">Hasil Bagi</a>
        <a href="?page=mahasiswa">Mahasiswa</a>
    </div>
    <?php
    error_reporting(0);
    $page = $_GET["page"];
    switch ($page) {
        case 'hitung':
            include "hitung.php";
            break;
        case 'mahasiswa':
            include "mahasiswa.php";
            break;
        default:
            echo "<p style='text-align: center; color: #666;'>Silakan pilih salah satu menu di atas.</p>";
            break;
    }
    ?>
</body>
</html>
