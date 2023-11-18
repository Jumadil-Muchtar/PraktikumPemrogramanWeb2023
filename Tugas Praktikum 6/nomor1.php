<!DOCTYPE html>
<html>
<head>
   <title>data barang</title>
</head>
<body>
   <form action="index.php" method="GET">
      <input type="text" name="tipe" placeholder="Masukkan tipe" required>
      <button type="submit">Submit</button>
   </form>
   <?php
   $data = 
   [
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

   $searchResult = [];

   // isset() return true -> variabel sdh di-set dan tdk null
   // alur: masukin input > submit > input + ke url sbg param > input diakses dri url pake $_GET
   if (isset($_GET['tipe'])) {
      $tipe = strtolower($_GET['tipe']);
      foreach ($data as $item) {          //nilai pd elemen $data akan disimpan di $item
         if (strtolower($item['jenis']) === $tipe) {
            $searchResult[] = $item;
         } 
      }
      if (count($searchResult)==0) {
         echo "tipe barang tidak ada";
      }         
   } 
   
   echo "<table border='1'><tr>";
   echo "<th>Nama</th>";
   echo "<th>Stok</th>";
   echo "<th>Harga</th>";
   echo "</tr>";


   if (isset($_GET['tipe'])) { 
      $tipe = strtolower($_GET['tipe']);

      // tiap elemen $searchResult disimpan dlm $barang yg nantinya bisa diakses nilai2nya
      foreach ($searchResult as $barang) {
         echo 
         "<tr>
            <td>" . $barang['nama_barang'] . "</td>
            <td>" . $barang['stok'] . "</td> 
            <td>" . $barang['harga'] . "</td>  
         </tr>";
      }
   }
   echo "</table>";
   ?>
</body>
</html>