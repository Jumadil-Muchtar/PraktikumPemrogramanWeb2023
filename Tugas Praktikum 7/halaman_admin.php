<?php
session_start();
$bolehmasuk = false;
if ($_SESSION['role'] !== "admin") { 
    $bolehmasuk = false;
    echo "Dilarang Masuk";
 
} else {
$bolehmasuk = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
  .center-text {
    text-align: center;
  }
</style>
</head>
<body>
    <?php
    if ($bolehmasuk == true) {
        echo '
    }
    ?>
    
    <h1 class="center-text">Halaman Admin</h1> <hr>
    <!-- Formulir Tambah Data -->
    <form method="post">
        <h3>Menambahkan Data</h3>
        <input type="hidden" name="action" value="tambah">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" required><br>
        <button type="submit">Tambah Data</button>
    </form>
    <br>

    <!-- Formulir Tampilkan Data -->
    <form method="post">
        <h3>Menampilkan Data</h3>
        <input type="hidden" name="action" value="tampil">
        <button type="submit">Tampilkan Data</button>
    </form>
    <br>

    <!-- Formulir Perbarui Data -->
    <form method="post">
        <h3>Memperbarui Data Yang Sudah Ada</h3>
        <input type="hidden" name="action" value="perbarui">
        <label for="id">ID Data:</label>
        <input type="text" name="id" required><br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" required><br>
        <button type="submit">Perbarui Data</button>
    </form>
    <br>

    <!-- Formulir Hapus Data -->
    <form method="post">
        <h3>Menghapus Data</h3>
        <input type="hidden" name="action" value="hapus">
        <label for="id">ID Data:</label>
        <input type="text" name="id" required><br>
        <button type="submit">Hapus Data</button>
    </form>
    <br>';
    


        $server = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "db_mahasiswa";

        //fungsi untuk menambahkan data
        function tambahData($nama, $nim, $prodi) {
            global $server, $db_username, $db_password, $db_name;

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "INSERT INTO tb_mahasiswa (Nama, NIM, Prodi) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nama, $nim, $prodi);

            $result = $stmt->execute();

            $stmt->close();
            $conn->close();

            return $result;
        }


        function ambilDataMahasiswa() {
            global $server, $db_username, $db_password, $db_name;
            //menggunakan variabel yang dideklarasikan di luar fungsi 

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT  id, Nama, NIM, Prodi FROM tb_mahasiswa";
            $result = $conn->query($sql);

            $data = array();
            

            if ($result->num_rows > 0) {
            //digunakan untuk mengambil setiap baris data dari hasil query dan menyimpannya dalam variabel $row sebagai array asosiatif. Loop ini akan berjalan sebanyak baris yang ada dalam hasil query.
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            $conn->close();
            return $data;
        }

        // Menampilkan data dalam bentuk tabel HTML
        function tampilkanTabelMahasiswa() {
            $dataMahasiswa = ambilDataMahasiswa();

            echo '<table border="1">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nama</th>';
            echo '<th>NIM</th>';
            echo '<th>Prodi</th>';
            echo '</tr>';
            echo '</thead>'; //bagian kepala tabel yang biasanya berisi baris judul (header).
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
        }

        // Fungsi Update
        function perbaruiData($id, $nama, $nim, $prodi) {
            global $server, $db_username, $db_password, $db_name;

            $conn = new mysqli($server, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "UPDATE tb_mahasiswa SET Nama=?, NIM=?, Prodi=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nama, $nim, $prodi, $id); 
            //mengganti isnya tanda tanya dengan s itu string i itu int yg id 

            $result = $stmt->execute(); //Hasil dari eksekusi disimpan dalam variabel $result.

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

            $sql = "DELETE FROM tb_mahasiswa WHERE id=?";
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
                            //memeriksa apakah data seperti "nama," "nim," dan "prodi" telah dikirim dalam permintaan POST. 
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
    } 
?>
</body>
</html>