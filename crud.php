<?php
    $connection = mysqli_connect("localhost", "root", "", "perusahaan_db");
    if (!$connection) {
        echo "Koneksi gagal: " . mysqli_connect_error();
        exit();
    }
    $data=($connection->query("SELECT * FROM karyawan_tb"));
    $d=(mysqli_fetch_array($data));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Karyawan</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Data Karyawan</h1>
    <div class="mb-4 text-center">
        <a href='crud.php'>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Refresh Data
            </button>
        </a>
    </div>

    <div class="flex flex-col md:flex-row md:space-x-8">
        <div class="flex-1 overflow-x-auto mb-6 md:mb-0">
            <table class="min-w-full bg-white rounded shadow-md">
                <thead>
                    <tr class="bg-blue-600 text-white text-left">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Jabatan</th>
                        <th class="py-3 px-4">Alamat</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($data)) {
                    echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                    echo "<td class='py-2 px-4'>" . htmlspecialchars($row['nomor_induk']) . "</td>";
                    echo "<td class='py-2 px-4'>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td class='py-2 px-4'>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td class='py-2 px-4'>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td class='py-2 px-4'>";
                    echo "<a href='crud.php?edit=" . urlencode($row['nomor_induk']) . "' class='text-blue-600 hover:underline mr-2'>Edit</a>";
                    echo "<a href='crud.php?delete=" . urlencode($row['nomor_induk']) . "' class='text-red-600 hover:underline' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            info
        </div>

        <?php
        $edit_mode = false;
        $edit_nomor_induk = "";
        $edit_nama = "";
        $edit_jenis_kelamin = "";
        $edit_alamat = "";

        if (isset($_GET['edit'])) {
            $edit_mode = true;
            $edit_id = $_GET['edit'];
            $edit_query = "SELECT * FROM karyawan_tb WHERE nomor_induk = '" . mysqli_real_escape_string($connection, $edit_id) . "'";
            $edit_result = $connection->query($edit_query);
            if ($edit_result && $edit_result->num_rows > 0) {
                $edit_row = $edit_result->fetch_assoc();
                $edit_nomor_induk = $edit_row['nomor_induk'];
                $edit_nama = $edit_row['nama'];
                $edit_jenis_kelamin = $edit_row['jenis_kelamin'];
                $edit_alamat = $edit_row['alamat'];
            }
        }
        ?>
        <div class="flex-1 max-w-md mx-auto md:mx-0 p-6 bg-white rounded shadow-md border border-gray-300">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">
                <?php echo $edit_mode ? "Edit Data Karyawan" : "Tambah Data Karyawan"; ?>
            </h2>
            <form method="POST" action="crud.php" class="space-y-4">
                <?php if ($edit_mode): ?>
                    <input type="hidden" name="edit_nomor_induk" value="<?php echo htmlspecialchars($edit_nomor_induk); ?>" />
                <?php endif; ?>
                <div>
                    <label for="nomor_induk" class="block text-gray-600 mb-1 font-medium">Nomor Induk:</label>
                    <input type="text" name="nomor_induk" id="nomor_induk" required
                        value="<?php echo $edit_mode ? htmlspecialchars($edit_nomor_induk) : ''; ?>"
                        <?php echo $edit_mode ? 'readonly' : ''; ?>
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label for="nama" class="block text-gray-600 mb-1 font-medium">Nama:</label>
                    <input type="text" name="nama" id="nama" required
                        value="<?php echo $edit_mode ? htmlspecialchars($edit_nama) : ''; ?>"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-gray-600 mb-1 font-medium">Jenis Kelamin:</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" required
                        value="<?php echo $edit_mode ? htmlspecialchars($edit_jenis_kelamin) : ''; ?>"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label for="alamat" class="block text-gray-600 mb-1 font-medium">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required
                        value="<?php echo $edit_mode ? htmlspecialchars($edit_alamat) : ''; ?>"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            <div class="flex space-x-4">
                <?php if ($edit_mode): ?>
                    <a href="crud.php"
                        class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded cursor-pointer">
                        Cancel
                    </a>
                    <input type="submit" name="update" value="Update"
                        class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 rounded cursor-pointer" />
                <?php else: ?>
                    <input type="submit" name="save" value="Simpan"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded cursor-pointer" />
                <?php endif; ?>
            </div>
            </form>
        </div>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['update'])) {
                // Handle update
                $edit_nomor_induk = $_POST['edit_nomor_induk'];
                $edit_nama = $_POST['nama'];
                $edit_jenis_kelamin = $_POST['jenis_kelamin'];
                $edit_alamat = $_POST['alamat'];

                $update_sql = "UPDATE karyawan_tb SET nama='$edit_nama', jenis_kelamin='$edit_jenis_kelamin', alamat='$edit_alamat' WHERE nomor_induk='$edit_nomor_induk'";
                if ($connection->query($update_sql) === TRUE) {
                    echo "<p class='max-w-md mx-auto mt-4 p-4 bg-green-200 border border-green-400 text-green-800 rounded-lg shadow-md'>Data berhasil diperbarui.</p>";
                } else {
                    echo "<p class='max-w-md mx-auto mt-4 p-4 bg-red-200 border border-red-400 text-red-800 rounded-lg shadow-md'>Error: " . htmlspecialchars($update_sql) . "<br>" . htmlspecialchars($connection->error) . "</p>";
                }
            } elseif (isset($_POST['save'])) {
                // Handle insert
                $nomor_induk = $_POST['nomor_induk'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $alamat = $_POST['alamat'];

                $sql = "INSERT INTO karyawan_tb (nomor_induk, nama, jenis_kelamin, alamat) VALUES ('$nomor_induk', '$nama', '$jenis_kelamin', '$alamat')";
                if ($connection->query($sql) === TRUE) {
                    echo "<p class='max-w-md mx-auto mt-4 p-4 bg-green-200 border border-green-400 text-green-800 rounded-lg shadow-md'>Data berhasil ditambahkan.</p>";
                } else {
                    echo "<p class='max-w-md mx-auto mt-4 p-4 bg-red-200 border border-red-400 text-red-800 rounded-lg shadow-md'>Error: " . htmlspecialchars($sql) . "<br>" . htmlspecialchars($connection->error) . "</p>";
                }
            }
        }

        // Handle delete
        if (isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
            $delete_sql = "DELETE FROM karyawan_tb WHERE nomor_induk = '" . mysqli_real_escape_string($connection, $delete_id) . "'";
            if ($connection->query($delete_sql) === TRUE) {
                echo "<p class='max-w-md mx-auto mt-4 p-4 bg-green-200 border border-green-400 text-green-800 rounded-lg shadow-md'>Data berhasil dihapus.</p>";
            } else {
                echo "<p class='max-w-md mx-auto mt-4 p-4 bg-red-200 border border-red-400 text-red-800 rounded-lg shadow-md'>Error: " . htmlspecialchars($delete_sql) . "<br>" . htmlspecialchars($connection->error) . "</p>";
            }
        }
    ?>

</body>
</html>
