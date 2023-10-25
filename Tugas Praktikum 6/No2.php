<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Perkenalan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <h2>Form Perkenalan</h2>

  <form method="post" action="">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="usia">Usia:</label>
    <input type="number" id="usia" name="usia" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select id="jenis_kelamin" name="jenis_kelamin" required>
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select><br>

    <label>Bahasa yang dikuasai:</label><br>
    <input type="checkbox" id="python" name="bahasa[]" value="python">
    <label for="python">python</label><br>

    <input type="checkbox" id="javascript" name="bahasa[]" value="Javascript">
    <label for="javascript">Javascript</label><br>

    <input type="checkbox" id="css" name="bahasa[]" value="css">
    <label for="css">css</label><br>

    <button type="submit">Kirim</button>
  </form>

<?php
  // Fungsi untuk membuat kalimat perkenalan
  function createIntroduction($nama, $usia, $email, $tanggalLahir, $jenisKelamin, $bahasa) {
      $jenisKelaminLabel = ($jenisKelamin == 'pria') ? 'Pria' : 'Wanita';
      $bahasaLabel = empty($bahasa) ? 'belum ada' : implode(", ", $bahasa);

      $kalimat = "Halo perkenalkan nama saya $nama ,saya berumur $usia tahun, email saya $email ,saya lahir pada tangal $tanggalLahir ,saya berjenis kelammin $jenisKelaminLabel, Bahasa yang saya kuasai $bahasaLabel";

      return $kalimat;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST["nama"];
      $usia = $_POST["usia"];
      $email = $_POST["email"];
      $tanggalLahir = $_POST["tanggal_lahir"];
      $jenisKelamin = $_POST["jenis_kelamin"];
      $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];

      $perkenalan = createIntroduction($nama, $usia, $email, $tanggalLahir, $jenisKelamin, $bahasa);
      echo "<p>$perkenalan</p>";
  }
  ?>
  
</body>
</html>
