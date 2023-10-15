<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins';
        }

        p {
            font-size: 30px;
            margin-right: 20px;
            font-weight: bold;
        }

        body {
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 30);
        }
    </style>
    <title>Formulir</title>
</head>

<body>
    <p>FORM</p>
    <table>
        <form method="POST">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td> : </td>
                <td><input type="text" name="nama" required>
                </td><br><br>
            </tr>

            <tr>
                <td><label for="usia">Usia</label></td>
                <td> : </td>
                <td><input type="number" name="usia" required></td><br><br>
            </tr>

            <tr>
                <td><label for="email">Email</label></td>
                <td> : </td>
                <td><input type="email" name="email" required></td><br><br>
            </tr>

            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                <td> : </td>
                <td><input type="date" name="tanggal_lahir" required></td><br><br>
            </tr>

            <tr>
                <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                <td> : </td>
                <td>
                    <input type="radio" name="jenis_kelamin" id="male" value="Laki-Laki" required>
                    <label for="male">Pria</label>
                    <input type="radio" name="jenis_kelamin" id="female" value="Perempuan" required>
                    <label for="female">Wanita</label>
                </td><br><br>
            </tr>

            <tr>
                <td><label for="bahasa">Bahasa yang dikuasai</label></td>
                <td> : </td>
                <td>
                    <input type="checkbox" name="bahasa[]" value="Java" id="java">
                    <label for="java">Java</label>
                    <input type="checkbox" name="bahasa[]" value="Python" id="python">
                    <label for="python">Python</label>
                    <input type="checkbox" name="bahasa[]" value="HTML" id="html">
                    <label for="html">HTML</label>
                    <input type="checkbox" name="bahasa[]" value="PHP" id="php">
                    <label for="php">PHP</label>
                    <input type="checkbox" name="bahasa[]" value="JavaScript" id="javascript">
                    <label for="javascript">JavaScript</label>
                </td>

            <tr>
                <td><input type="submit" value="Kirim"></td>
            </tr>

            <tr>
                <td>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $nama = $_POST['nama'];
                        $usia = $_POST['usia'];
                        $email = $_POST['email'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $bahasa = isset($_POST['bahasa']) ? $_POST['bahasa'] : [];

                        // Mengubah format tanggal lahir
                        $tanggal_lahir = date('d M Y', strtotime($tanggal_lahir));

                        $output = "<h2>OUTPUT</h2>";
                        $output .= "Nama" . "  " . " : $nama<br>";
                        $output .= "Usia : $usia tahun<br>";
                        $output .= "Email : $email<br>";
                        $output .= "Tanggal Lahir : $tanggal_lahir<br>";
                        $output .= "Jenis Kelamin : $jenis_kelamin<br>";

                        if (!empty($bahasa)) {
                            $output .= "Bahasa yang dikuasai : " . implode(", ", $bahasa) . "<br>";
                        } else {
                            $output .= "Tidak Ada Bahasa Yang Dikuasai";
                        }
                        echo $output;
                    }
                    ?>
                </td>
            </tr>
        </form>
    </table>

</body>


</html>