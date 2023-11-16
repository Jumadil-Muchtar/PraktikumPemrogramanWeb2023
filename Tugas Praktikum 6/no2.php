<!DOCTYPE html>
<html>
<head>
    <title>Form Perkenalan</title>
</head>
<body>
    <h1>Form Perkenalan</h1>
    <form method="post">
        <label for="nama">Nama : </label> 
        <input type="text" id="nama" name="nama" ><br>
        <label for="number">Usia : </label> 
        <input type="number" id="number" name="usia"><br>
        <label for="email">Email : </label> 
        <input type="text" id="email" name="email"><br>
        <label for="tanggallahir"> Tanggal Lahir : </label>
        <input type="date" id="tanggallahir" name="tanggal_lahir" required> <br> <br>
        <label for="radio" >Jenis Kelamin : </label> <br>
        <input type="radio" id ="radio" name = "jenis_kelamin" value = "perempuan">
        <label for="jenis kelamin">perempuan</label>
        <input type="radio" id ="radio" name = "jenis_kelamin" value = "laki-laki">
        <label for="jenis kelamin">laki-laki</label> <br> <br>
        Bahasa yang dikuasai:<br>
        <input type="checkbox" name="bahasa[]" value="Java">Java
        <input type="checkbox" name="bahasa[]" value="Python">Python
        <input type="checkbox" name="bahasa[]" value="HTML">HTML
        <input type="checkbox" name="bahasa[]" value="CSS">CSS
        <input type="checkbox" name="bahasa[]" value="JavaScript">JavaScript
        <input type="checkbox" name="bahasa[]" value="PHP">PHP<br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    //server method untuk akses informasi 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $email = $_POST['email'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $bahasa = $_POST['bahasa'];

        $kalimat = "Halo, perkenalkan nama saya $nama. Saya berusia $usia tahun. "; 
        $kalimat .= "Saya lahir pada tanggal $tanggal_lahir. ";
        $kalimat .= "Saya adalah seorang $jenis_kelamin. ";

        if (!empty($bahasa)) { 
            $kalimat .= "Saya bisa berbicara dalam bahasa "; 
            $kalimat .= implode(", ", $bahasa); //implode, yang mengubah array bahasa menjadi string yang dipisahkan oleh koma.
            $kalimat .= ".";
        } else { 
            $kalimat .= "Saya tidak menguasai bahasa pemrograman"; 
        }

        echo "<h2>Perkenalan Singkat:</h2>";
        echo $kalimat;
    }
    ?>
</body>
</html>
