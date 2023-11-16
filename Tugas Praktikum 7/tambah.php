<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'function.php';
if (isset($_POST["submit"])) {
    // mengambil data dari elemen dlm form


    //query insert data


    //cek apakah data brhasil di tmbhkn atau tdk
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan')
        document.location.href = 'index.php'
        </script>!";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan')
        </script>!";;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   

    <style>
        /* input */

        .input-data {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 15rem;
        }

        input {
            border: 2px solid transparent;
            width: 25em;
            height: 2.5em;
            padding-left: 0.8em;
            outline: none;
            overflow: hidden;
            background-color: #F3F3F3;
            border-radius: 10px;
            transition: all 0.5s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input:hover,
        input:focus {
            border: 2px solid #4A9DEC;
            box-shadow: 0px 0px 0px 7px rgb(74, 157, 236, 20%);
            background-color: white;
        }

        /* button */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .button {
            position: relative;
            width: 150px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            border: 1px solid #34974d;
            background-color: #3aa856;
        }

        .button,
        .button__icon,
        .button__text {
            transition: all 0.3s;
        }

        .button .button__text {
            transform: translateX(30px);
            color: #fff;
            font-weight: 600;
        }

        .button .button__icon {
            position: absolute;
            transform: translateX(109px);
            height: 100%;
            width: 39px;
            background-color: #34974d;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button .svg {
            width: 30px;
            stroke: #fff;
        }

        .button:hover {
            background: #34974d;
        }

        .button:hover .button__text {
            color: transparent;
        }

        .button:hover .button__icon {
            width: 148px;
            transform: translateX(0);
        }

        .button:active .button__icon {
            background-color: #2e8644;
        }

        .button:active {
            border: 1px solid #2e8644;
        }

    </style>
</head>

<body>
   
    <form action="" method="post">
        <a href="index.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAS9JREFUaEPt2NENwjAMBNDrJrAJbAKbwCTAJDAKo6B8REIoIY7tNFfJ/LYu9+xIbbJg479l4/kRgNkTjAnEBIwdiCVUaOAOwNvYWHG59wQOAJ4ArgAu4hSGGz0BOXyOswrCC/AbPiP2o5eTB6AW/gjgZVgdolIrYGr4JLQApoe3ACjCawE04TUAqvC9ALrwPQDK8FIAbXgJgDp8C1ALL3pDDrip+M6qvcjYwlebXQOcANwGdNHyyK4JpD9iQ3QDaoi023qstWFpjUzyMVeaBA1CAqCehBRAi+gBUCJ6AXQIDYAKoQXQICwACoQVMB3hAfiHSGdDQ89JvQAlxBnAvfUpYL3uCfhGrBK+taHRNmfTx+tatLrOewmpg2gLA6DtnFddTMCrk9rnxAS0nfOq+wC720Ux9gB1mwAAAABJRU5ErkJggg=="/></a>
        <div class="input-data">

            <input type="text" name="nama" id="nama" placeholder="Nama" required> <br><br>

            <input type="text" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa" required> <br><br>

            <input type="text" name="fakultas" id="fakultas" placeholder="Fakultas" required> <br><br>

            <input type="text" name="jurusan" id="jurusan" placeholder="Program Studi" required> <br><br>
        </div>
        <div class="button-container">
            <button type="submit" name="submit" class="button">
                <span class="button__text">Add Data</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                        <line y2="19" y1="5" x2="12" x1="12"></line>
                        <line y2="12" y1="12" x2="19" x1="5"></line>
                    </svg></span>
            </button>
        </div>



    </form>
</body>

</html>