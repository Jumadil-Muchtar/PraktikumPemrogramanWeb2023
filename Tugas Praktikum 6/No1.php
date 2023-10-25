<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <form method="post" action="">
    <input type="text" id="jenis" name="jenis" placeholder="Masukkan jenis barang" >
    <button type="submit">Submit</button>
  </form>
  
  <?php
  $data = [
      [
          "nama_barang" => "HP",
          "harga" => 3000000,
          "stok" => 10,
          "jenis" => "Elektronik"
      ],
      [
          "nama_barang" => "Jeruk",
          "harga" => 5000,
          "stok" => 20,
          "jenis" => "Buah"
      ],
      [
          "nama_barang" => "Kemeja",
          "harga" => 5000,
          "stok" => 9,
          "jenis" => "Pakaian"
      ],
      [
          "nama_barang" => "Apel",
          "harga" => 5000,
          "stok" => 5,
          "jenis" => "Buah"
      ],
      [
          "nama_barang" => "Celana",
          "harga" => 5000,
          "stok" => 10,
          "jenis" => "Pakaian"
      ],
      [
          "nama_barang" => "Laptop",
          "harga" => 50000,
          "stok" => 30,
          "jenis" => "Elektronik"
      ],
      [
          "nama_barang" => "Semangka",
          "harga" => 5000,
          "stok" => 2,
          "jenis" => "Buah"
      ],
      [
          "nama_barang" => "Kaos",
          "harga" => 5000,
          "stok" => 1,
          "jenis" => "Pakaian"
      ],
      [
          "nama_barang" => "VGA",
          "harga" => 2000000,
          "stok" => 0,
          "jenis" => "Elektronik"
      ]
  ];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $jenisBarang = strtolower($_POST["jenis"]);

      $barangPerJenis = [];
      foreach ($data as $barang) {
          $jenis = strtolower($barang["jenis"]);
          if (strpos($jenis, $jenisBarang) !== false) {
              $barangPerJenis[] = $barang;
          }
      }

      if (!empty($barangPerJenis)) {
          echo "<table border='1'>";
          echo "<thead>
          <tr
          ><th>Nama Barang</th>
          <th>Stok</th>
          <th>Harga</th>
          </tr>
          </thead>";
          echo "<tbody>";
          foreach ($barangPerJenis as $data) {
              echo "<tr>";
              echo "<td>{$data['nama_barang']}</td>";
              echo "<td>{$data['stok']}</td>";
              echo "<td>{$data['harga']}</td>";
              echo "</tr>";
          }
          echo "</tbody></table>";
      } else {
          echo "<p>Tidak ada data untuk jenis barang $jenisBarang.</p>";
      }
  }
  ?>

</body>
</html>
