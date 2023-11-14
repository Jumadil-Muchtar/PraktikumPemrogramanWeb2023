<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 6</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <form action="" method="post">
        <label for="">Nama Lengkap : </label>
        <input type="text" name="nama" required><br><br>

        <label for="">Usia : </label>
        <input type="number" name="usia" required><br><br>

        <label for="">Email : </label>
        <input type="email" name="email" required><br><br>

        <label for="">Tanggal Lahir : </label>
        <input type="date" name= "date" required><br><br>

        <label for="">Jenis Kelamin : </label>
        <input type="radio" name= "jenisKelamin" value ="Laki-laki" required>Laki-laki
        <input type="radio" name= "jenisKelamin" value ="Perempuan" required>Perempuan <br><br>

        <label for="">Bahasa yg dikuasai : </label>
        <input type="checkbox" name= "checkbox[]" value="Java"> Java
        <input type="checkbox" name= "checkbox[]" value="Python"> Python
        <input type="checkbox" name= "checkbox[]" value="HTML"> HTML
        <input type="checkbox" name= "checkbox[]" value="CSS"> CSS
        <input type="checkbox" name= "checkbox[]" value="JavaScript"> JavaScript
        <input type="checkbox" name= "checkbox[]" value="PHP"> PHP <br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php if (isset($_POST["submit"])) : ?>
        <?php 
            $nama = $_POST["nama"];
            $usia = $_POST["usia"];
            $tanggalLahir = $_POST["date"];
            $tanggal = date('d', strtotime($tanggalLahir));
            $bulan = date('F', strtotime($tanggalLahir));
            $tahun = date('Y', strtotime($tanggalLahir));
            $jenisKelamin = "(Belum dipilih)";
            if (isset($_POST["jenisKelamin"])) {
                $jenisKelamin = $_POST["jenisKelamin"];
            }
            $bahasaDikuasai = isset($_POST["checkbox"]) ? $_POST["checkbox"] : array();
            $bahasaText = "";

            if(!empty($bahasaDikuasai)){
                $bahasaText = "saya berhasil menguasai bahasa pemrograman " . implode(", ", $bahasaDikuasai);
            } else {
                $bahasaText = "Saat ini saya belum menguasai bahasa pemrograman apapun";
            }
        ?>
            <h1>Halo! Perkenalkan nama saya <?php echo $nama; ?>, saya berumur <?php echo $usia?> tahun, lahir pada tanggal <?php echo $tanggal?> <?php echo $bulan?> tahun <?php echo $tahun?>. Saya berjenis kelamin <?php echo $jenisKelamin?> dan <?php echo $bahasaText ?></h1>
    <?php endif; ?>
</body>
</html>
