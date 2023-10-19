<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. 2</title>
</head>
<body>
    <h2>Form Perkenalan</h2>
    <form method="POST" action="">
        <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><input type="text" name="Nama" required></td>
        </tr>

        <tr>
            <td>Usia</td>
            <td>:</td>
            <td><input type="int" name="usia" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" required></td>
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="date" name="TTL" required></td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
            </td>
        </tr>

        <tr>
            <td>Bahasa yang dikuasai</td>
            <td>:</td>
            <td>
                <input type="checkbox" id="option1" name="bahasa[]" value="Java"> Java
                <input type="checkbox" id="option2"  name="bahasa[]" value="Python"> Python
                <input type="checkbox" id="option3" name="bahasa[]" value="HTML"> HTML
                <input type="checkbox" id="option4" name="bahasa[]" value="CSS"> CSS
                <input type="checkbox" id="option5" name="bahasa[]" value="JavaScript"> JavaScript
                <input type="checkbox" id="option6" name="bahasa[]" value="PHP"> PHP
            </td>
        </tr>
        </table>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['Nama'];
            $usia = $_POST['usia'];
            if (is_numeric($usia) && $usia >= 0) {
                $kata1 = "Halo! Perkenalkan nama saya " . $name . ", saya berumur " . $usia . " tahun, ";

            $date = $_POST['TTL'];
            $tanggal = date("d", strtotime($date));
            $bulan = [
                '01' => 'januari',
                '02' => 'februari',
                '03' => 'maret',
                '04' => 'april',
                '05' => 'mei',
                '06' => 'juni',
                '07' => 'juli',
                '08' => 'agustus',
                '09' => 'september',
                '10' => 'oktober',
                '11' => 'november',
                '12' => 'desember'
            ];
            $tahun = date("Y", strtotime($date));
            $kata2 = "saya lahir pada tanggal " . $tanggal . " " . $bulan[date("m", strtotime($date))] . " tahun " . $tahun . ", ";

            $gender = $_POST["jenis_kelamin"];
            if ($gender == "Laki-laki") {
                $kata3 = "saya berjenis kelamin Laki-laki ";
            } elseif ($gender == "Perempuan") {
                $kata3 = "saya berjenis kelamin Perempuan ";
            }

            if (isset($_POST["bahasa"])) {
                $bahasa = $_POST["bahasa"];
                    if (count($bahasa) > 1) {
                        $bahasa_terakhir = end($bahasa);
                        array_pop($bahasa);
                        $kata4 = "dan saat ini saya berhasil menguasai bahasa pemrograman " . implode(", ", $bahasa) . " dan " . $bahasa_terakhir;
                    } else {
                        $kata4 = "dan saat ini saya berhasil menguasai bahasa pemrograman " . implode(", ", $bahasa);                    }
                } else {
                    $kata4 = "dan saat ini saya belum menguasai bahasa pemrograman apapun.";
                } 
            echo $kata1 . $kata2 . $kata3 . $kata4; 
        } else {
        echo "Usia harus berupa angka positif.";
    }
    
}
    ?>
    
</body>
</html>