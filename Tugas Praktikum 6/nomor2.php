<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
   <table>
      <h2>Form</h2>
   <form method="POST" NAME="input">
      <tr>
         <td><label for="nama">Nama Lengkap</label></td>
         <td><span>: </span><input type="text"id="nama" name="name" required></td>
      </tr>
      <tr>
         <td><label for="usia">Usia</label></td>
         <td><span>: </span><input type="text" id="usia" name="age" required></td>
      </tr>
      <tr>
         <td><label for="e-mail">Email</label></td>
         <td><span>: </span><input type="text" id="e-mail" name="email" required></td>
      </tr>
      <tr>
         <td><label for="tgl">Tanggal lahir</label></td>
         <td><span>: </span><input type="date" id="tgl" name="birthdate" required></td>
      </tr>
      <tr>
         <td>Jenis Kelamin </td>
         <td><span>: </span>
            <input type="radio" id="male" name="gender" value="laki-laki">
            <label for="male">Laki-Laki</label>
            <input type="radio" id="female" name="gender" value="perempuan">
            <label for="female">Perempuan</label>
         </td>
      <tr>
      <tr>
         <td>Bahasa yang dikuasai </td>
         <td><span>: </span>
            <input type="checkbox" id="java" name="bahasa[]" value="Java">
            <label for="java">Java</label>
            <input type="checkbox" id="python" name="bahasa[]" value="Python">
            <label for="python">Python</label>
            <input type="checkbox" id="html" name="bahasa[]" value="HTML">
            <label for="html">HTML</label>
            <input type="checkbox" id="css" name="bahasa[]" value="CSS">
            <label for="css">CSS</label>
            <input type="checkbox" id="js" name="bahasa[]" value="JavaScript">
            <label for="js">JavaScript</label>
            <input type="checkbox" id="php" name="bahasa[]" value="PHP">
            <label for="php">PHP</label>
         </td>
      <tr>
         <td><input type="submit" name="submit" value="Submit"></td>
      </tr>
   </form>
   </table>
   <?php 
   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      $nama = $_POST['name']; 
      $umur = $_POST['age'];
      $email = $_POST['email'];
      $tanggal_lahir = date("j F Y", strtotime($_POST['birthdate']));
      $jenis_kelamin = $_POST['gender'];
      // jika ada bahasa yg dpilih maka akan disimpan di $bahasa jika tdk ada maka $bahasa akan berisi array kosong}
      $bahasa = isset($_POST['bahasa']) ? $_POST['bahasa'] : array();
      $output = "Halo! Perkenalkan nama saya $nama, saya berumur $umur tahun, saya lahir pada tanggal $tanggal_lahir, saya berjenis kelamin $jenis_kelamin, "; 
      
      // jika $bahasa adalah array dan tdk kosong
      if (is_array($bahasa) && !empty($bahasa)) {
         //implode menggabungkan elemen2 array jdi 1 string
         $output .= " dan saat ini saya menguasai bahasa pemrograman: " . implode(", ", $bahasa) . ".";
      } else {
         $output .= " dan saat ini saya belum menguasai bahasa pemrograman apapun.";
      }
      if (isset($output)) {
         echo "<p>$output</p>";
      }
   }
   ?>
</body>
</html>