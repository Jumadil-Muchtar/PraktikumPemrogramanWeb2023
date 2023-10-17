<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <body>
        <form method="post" action="main.php">
            <table>
                <tr>
                    <td><label for="nama">Nama Lengkap</label></td>
                    <td> : <input type="text" id="nama" name="nama" required></td>
                </tr>
                <tr>
                    <td><label for="usia">Usia</label></td>
                    <td> : <input type="number" id="usia" name="usia" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td> : <input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                    <td> : <input type="date" id="tgl_lahir" name="tgl_lahir" required></td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                    <td>
                        : <label for="laki">Laki-Laki</label>
                        <input type="radio" id="laki" name="kelamin" value="Laki-laki" required>
                        <label for="perempuan">Perempuan</label>
                        <input type="radio" id="perempuan" name="kelamin" value="Perempuan" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Bahasa Yang Dikuasai</label></td>
                    <td>
                        :<input type="checkbox" id="python" name="python" value="Python">
                         <label for="python">Python</label>
                         <input type="checkbox" id="java" name="java" value="Java">
                         <label for="java">Java</label>
                         <input type="checkbox" id="html" name="html" value="HTML">
                         <label for="html">HTML</label>
                         <input type="checkbox" id="css" name="css" value="CSS">
                         <label for="css">CSS</label>
                         <input type="checkbox" id="javascript" name="javascript" value="Javascript">
                         <label for="javascript">Javascript</label>
                         <input type="checkbox" id="php" name="php"value="PHP">
                         <label for="php">PHP</label>
                    
                    </td>
                </tr>
                <tr>
                    <td><button type="submit">Submit</button></td>
                </tr>



            </table>
        </form>
        
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $myArray = [];
        if (isset($_POST["nama"])) {
            $nama = $_POST["nama"];
        }
        
        if (isset($_POST["usia"])) {
            $usia = $_POST["usia"];
        }
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
        }
        
        if (isset($_POST["tgl_lahir"])) {
            $tgl_lahir = $_POST["tgl_lahir"];
        }
        if (isset($_POST["kelamin"])) {
            $kelamin = $_POST["kelamin"];
        }
        if (isset($_POST["python"])) {
            $myArray[] = $_POST["python"];
        }
        if (isset($_POST["java"])) {
            $myArray[] = $_POST["java"];
        }
        if (isset($_POST["html"])) {
            $myArray[] = $_POST["html"];
        }
        if (isset($_POST["css"])) {
            $myArray[] =$_POST["css"];
        }
        if (isset($_POST["javascript"])) {
            $myArray[] = $_POST["javascript"];
        }
        if (isset($_POST["php"])) {
            $myArray[] = $_POST["php"];
        }
        $bulanInggris = array(
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        );

        $bulanIndonesia = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        //mengubah bulan yang awalnya dalam bhs inggris menjadi indonesia
        $bulan = date("F", strtotime($tgl_lahir));
        $tanggal = date("j", strtotime($tgl_lahir));
        $tahun = date("Y", strtotime($tgl_lahir));
        $terjemah = str_replace($bulanInggris, $bulanIndonesia, $bulan);
        $stringKosong = "";
        
        for ($i=0; $i < count($myArray); $i++) { 
            $stringKosong .= $myArray[$i] ;
            if($i < count($myArray)-1){

                $stringKosong .= ", ";
            }
            if($i == count($myArray)-2){
                $stringKosong .= "Dan ";
            }
        }
        if(empty($myArray)){
            echo "Halo! Perkenalkan Nama Saya $nama, Saya Berumur $usia Tahun, Saya Lahir Pada Tanggal $tanggal $terjemah $tahun, Saya Berjenis Kelamin $kelamin, Saat Ini Saya Belum Bisa Menguasai Bahasa Pemrograman Apapun";
        }else{
            echo "Halo! Perkenalkan Nama Saya $nama, Saya Berumur $usia Tahun, Saya Lahir Pada Tanggal $tanggal $terjemah $tahun, Saya Berjenis Kelamin $kelamin, Saat Ini Saya Berhasil Menguasai Bahasa Pemrograman $stringKosong";
        }

    }
        ?>
    </body>
</body>

</html>