<!DOCTYPE html>
<html>

<head>
    <title>Formulir Perkenalan</title>
</head>

<body>
    <h2>Tugas Praktikum 6 soal 2</h2>
    <h2>Formulir Perkenalan</h2>
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="usia">Usia:</label>
        <input type="number" name="usia" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required><br>

        <label>Jenis Kelamin:</label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan<br>

        <label>Bahasa yang Dikuasai:</label><br>
        <input type="checkbox" name="bahasa[]" value="Java"> Java
        <input type="checkbox" name="bahasa[]" value="Python"> Python
        <input type="checkbox" name="bahasa[]" value="HTML"> HTML
        <input type="checkbox" name="bahasa[]" value="CSS"> CSS
        <input type="checkbox" name="bahasa[]" value="JavaScript"> JavaScript
        <input type="checkbox" name="bahasa[]" value="PHP"> PHP<br>

        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $usia = $_POST["usia"];
        $email = $_POST["email"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];

        echo "Hallo, perkenalkan nama saya $nama saya berusia $usia tahun, saya lahir pada tanggal $tgl_lahir, saya berjenis kelamin $jenis_kelamin dan saat ini saya ";

        if (!empty($bahasa)) {
            echo "berhasil menguasai bahasa pemrograman " . implode(", ", $bahasa) . ".";
        } else {
            echo "belum menguasai bahasa pemrograman apapun.";
        }
    }
    ?>
</body>

</html>