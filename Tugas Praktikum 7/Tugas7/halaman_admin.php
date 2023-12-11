<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Functions</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Halaman Admin</h1>
        
        <!-- Tombol Log Out -->
        <form action="logout.php" method="post" class="mb-4">
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>

        <hr>

        <!-- Formulir Tambah Data -->
        <form method="post" class="mb-4">
            <h3 class="mb-3">Fungsi Menambahkan Data</h3>
            <input type="hidden" name="action" value="tambah">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi:</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>

        <!-- Formulir Tampilkan Data -->
        <form method="post" class="mb-4">
            <h3 class="mb-3">Fungsi Menampilkan Data</h3>
            <input type="hidden" name="action" value="tampil">
            <button type="submit" class="btn btn-primary">Tampilkan Data</button>
        </form>

        <!-- Formulir Perbarui Data -->
        <form method="post" class="mb-4">
            <h3 class="mb-3">Fungsi Memperbarui Data</h3>
            <input type="hidden" name="action" value="perbarui">
            <div class="mb-3">
                <label for="id" class="form-label">ID Data:</label>
                <input type="text" name="id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi:</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Data</button>
        </form>

        <!-- Formulir Hapus Data -->
        <form method="post" class="mb-4">
            <h3 class="mb-3">Fungsi Menghapus Data</h3>
            <input type="hidden" name="action" value="hapus">
            <div class="mb-3">
                <label for="id" class="form-label">ID Data:</label>
                <input type="text" name="id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus Data</button>
        </form>
    </div>

    <?php
        session_start();

        // Periksa apakah pengguna sudah login dan memiliki peran admin
        if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
            header("Location: login.php"); // Redirect ke halaman login jika belum login
            exit();
        }

        $server = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "db_tugas";

        // Fungsi Create (Insert)
        function tambahData($nama, $nim, $prodi) {
            global $server, $db_username, $db_password, $db_name;

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "INSERT INTO tb_tugas (Nama, NIM, Prodi) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nama, $nim, $prodi);

            $result = $stmt->execute();

            $stmt->close();
            $conn->close();

            return $result;
        }

        // Fungsi Read (Select)
        function ambilDataMahasiswa() {
            global $server, $db_username, $db_password, $db_name;
    
            $conn = new mysqli($server, $db_username, $db_password, $db_name);
    
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }
    
            $sql = "SELECT  id, Nama, NIM, Prodi FROM tb_tugas";
            $result = $conn->query($sql);
    
            $data = array();
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
    
            $conn->close();
            return $data;
        }
    
        // Menampilkan data dalam bentuk tabel HTML dengan Bootstrap
        function tampilkanTabelMahasiswa() {
            $dataMahasiswa = ambilDataMahasiswa();
    
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="thead-light">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nama</th>';
            echo '<th>NIM</th>';
            echo '<th>Prodi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            foreach ($dataMahasiswa as $row) {
                echo '<tr>';
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['Nama']}</td>";
                echo "<td>{$row['NIM']}</td>";
                echo "<td>{$row['Prodi']}</td>";
                echo '</tr>';
            }
    
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }

        // Fungsi Update
        function perbaruiData($id, $nama, $nim, $prodi) {
            global $server, $db_username, $db_password, $db_name;

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "UPDATE tb_tugas SET Nama=?, NIM=?, Prodi=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nama, $nim, $prodi, $id);

            $result = $stmt->execute();

            $stmt->close();
            $conn->close();

            return $result;
        }

        // Fungsi Delete
        function hapusData($id) {
            global $server, $db_username, $db_password, $db_name;

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "DELETE FROM tb_tugas WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            $result = $stmt->execute();

            $stmt->close();
            $conn->close();

            return $result;
        }

        // Menangani Form Submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["action"])) {
                $action = $_POST["action"];

                switch ($action) {
                    case 'tambah':
                        if (isset($_POST["nama"]) && isset($_POST["nim"]) && isset($_POST["prodi"])) {
                            tambahData($_POST["nama"], $_POST["nim"], $_POST["prodi"]);
                        } else {
                            echo "Isi semua kolom!";
                        }
                        break;

                    case 'tampil':
                        tampilkanTabelMahasiswa();
                        break;

                    case 'perbarui':
                        if (isset($_POST["id"]) && isset($_POST["nama"]) && isset($_POST["nim"]) && isset($_POST["prodi"])) {
                            perbaruiData($_POST["id"], $_POST["nama"], $_POST["nim"], $_POST["prodi"]);
                        } else {
                            echo "Isi semua kolom!";
                        }
                        break;

                    case 'hapus':
                        if (isset($_POST["id"])) {
                            hapusData($_POST["id"]);
                        } else {
                            echo "ID tidak valid!";
                        }
                        break;
                    
                    default:
                        echo 'Aksi tidak valid';
                        break;
                }
            }
        }
        ?>
            <!-- Tambahkan referensi Bootstrap JS jika diperlukan -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


