<?php
session_start();
require 'function.php';

// // cek cookie
// if(isset($_COOKIE['login'])){
//     if($_COOKIE['login'] == 'true'){
//         $_SESSION['login'] == 'true';
//     }
// }

if(isset($_SESSION["login"])){
    //cek role
    if($_SESSION['roleadmin'] === 'admin'){
        header('Location: index.php');
        exit;
    }elseif ($_SESSION['rolemahasiswa'] === 'mahasiswa'){
        header('Location: indexx.php');
        exit;
    }
}

if (isset($_POST["submit"])) {
    // cek username pass
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        $_SESSION["login"] = true;
        $_SESSION['roleadmin'] = 'admin';
        // jika benar, redirect ke nextpage
        header("Location: index.php");
        exit;
    }
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            
            //set session
            $_SESSION["login"] = true;
            $_SESSION['rolemahasiswa'] = 'mahasiswa';
            // //cek remember me
            // if(isset($_POST["remember"])){
            //     setcookie('login', 'true', time()+60);
            // }
            
            header("location: indexx.php");
            exit;
            
        }
    } 
        // jika salah, tampilkan pesan kesalahan
        $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'poppins';
        }

        /* card */
        .e-card {
            margin: 150px auto;
            background: transparent;
            box-shadow: 0px 8px 28px -9px rgba(0, 0, 0, 0.45);
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 540px;
            height: 500px;
            border-radius: 16px;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            width: 540px;
            height: 700px;
            opacity: 0.6;
            left: 0;
            top: 0;
            margin-left: -50%;
            margin-top: -70%;
            background: linear-gradient(744deg, #af40ff, #5b42f3 60%, #00ddeb);
        }




        .wave:nth-child(2),
        .wave:nth-child(3) {
            top: 210px;
        }

        .playing .wave {
            border-radius: 40%;
            animation: wave 3000ms infinite linear;
        }

        .wave {
            border-radius: 40%;
            animation: wave 55s infinite linear;
        }

        .playing .wave:nth-child(2) {
            animation-duration: 4000ms;
        }

        .wave:nth-child(2) {
            animation-duration: 50s;
        }

        .playing .wave:nth-child(3) {
            animation-duration: 5000ms;
        }

        .wave:nth-child(3) {
            animation-duration: 45s;
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .login-container {
            font-weight: 700;
            position: relative;
            flex-direction: column;
        }

        .login-container .checkbox {
            font-weight: 100;
        }

        .login-text {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        /* input */

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
        }

        input:hover,
        input:focus {
            border: 2px solid #4A9DEC;
            box-shadow: 0px 0px 0px 7px rgb(74, 157, 236, 20%);
            background-color: white;
        }

        /* checkbox */
        label {
            display: flex;
            font-weight: 300;
        }

        .cl-checkbox {
            position: relative;
            display: inline-block;
            margin-top: 0.5rem;
        }


        .cl-checkbox>input {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            z-index: -1;
            position: absolute;
            left: -10px;
            top: -8px;
            display: block;
            margin: 0;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: none;
            outline: none;
            opacity: 0;
            transform: scale(1);
            pointer-events: none;
            transition: opacity 0.3s, transform 0.2s;
        }

        /* Span */
        .cl-checkbox>span {
            display: inline-block;
            width: 100%;
            cursor: pointer;
        }


        .cl-checkbox>span::before {
            content: "";
            display: inline-block;
            box-sizing: border-box;
            margin: 3px 11px 3px 1px;
            border: solid 2px;
            /* Safari */
            border-color: rgba(0, 0, 0, 0.6);
            border-radius: 2px;
            width: 18px;
            height: 18px;
            vertical-align: top;
            transition: border-color 0.2s, background-color 0.2s;
        }


        .cl-checkbox>span::after {
            content: "";
            display: block;
            position: absolute;
            top: 3px;
            left: 1px;
            width: 10px;
            height: 5px;
            border: solid 2px transparent;
            border-right: none;
            border-top: none;
            transform: translate(3px, 4px) rotate(-45deg);
        }


        .cl-checkbox>input:checked,
        .cl-checkbox>input:indeterminate {
            background-color: #018786;
        }

        .cl-checkbox>input:checked+span::before,
        .cl-checkbox>input:indeterminate+span::before {
            border-color: #018786;
            background-color: #018786;
        }

        .cl-checkbox>input:checked+span::after,
        .cl-checkbox>input:indeterminate+span::after {
            border-color: #fff;
        }

        .cl-checkbox>input:indeterminate+span::after {
            border-left: none;
            transform: translate(4px, 3px);
        }


        .cl-checkbox:hover>input {
            opacity: 0.04;
        }

        .cl-checkbox>input:focus {
            opacity: 0.12;
        }

        .cl-checkbox:hover>input:focus {
            opacity: 0.16;
        }


        .cl-checkbox>input:active {
            opacity: 1;
            transform: scale(0);
            transition: transform 0s, opacity 0s;
        }

        .cl-checkbox>input:active+span::before {
            border-color: #85b8b7;
        }

        .cl-checkbox>input:checked:active+span::before {
            border-color: transparent;
            background-color: rgba(0, 0, 0, 0.6);
        }


        .cl-checkbox>input:disabled {
            opacity: 0;
        }

        .cl-checkbox>input:disabled+span {
            color: rgba(0, 0, 0, 0.38);
            cursor: initial;
        }

        .cl-checkbox>input:disabled+span::before {
            border-color: currentColor;
        }

        .cl-checkbox>input:checked:disabled+span::before,
        .cl-checkbox>input:indeterminate:disabled+span::before {
            border-color: transparent;
            background-color: currentColor;
        }

        .cl-checkbox span {
            font-size: 14px;

        }

        .rm-fp a {
            flex-direction: row;
            font-size: 14px;
            font-weight: 300;
            margin-left: 5.4rem;
            text-decoration: none;
            color: #4A9DEC;

        }

        /* Button */
        .button {
            position: relative;
            padding: 10px 22px;
            border-radius: 6px;
            border: none;
            color: #fff;
            cursor: pointer;
            background-color: #7d2ae8;
            transition: all 0.2s ease;
            width: 25em;
        }

        .btn {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            margin-bottom: 2rem;

        }

        .button:active {
            transform: scale(0.96);
        }

        .button:before,
        .button:after {
            position: absolute;
            content: "";
            width: 150%;
            left: 50%;
            height: 100%;
            transform: translateX(-50%);
            z-index: -1000;
            background-repeat: no-repeat;
        }

        .button:hover:before {
            top: -70%;
            background-image: radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, transparent 20%, #7d2ae8 20%, transparent 30%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, transparent 10%, #7d2ae8 15%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%);
            background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%,
                10% 10%, 18% 18%;
            background-position: 50% 120%;
            animation: greentopBubbles 0.6s ease;
        }

        @keyframes greentopBubbles {
            0% {
                background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%,
                    40% 90%, 55% 90%, 70% 90%;
            }

            50% {
                background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%,
                    50% 50%, 65% 20%, 90% 30%;
            }

            100% {
                background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%,
                    50% 40%, 65% 10%, 90% 20%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }

        .button:hover::after {
            bottom: -70%;
            background-image: radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, transparent 10%, #7d2ae8 15%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%),
                radial-gradient(circle, #7d2ae8 20%, transparent 20%);
            background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 20% 20%, 18% 18%;
            background-position: 50% 0%;
            animation: greenbottomBubbles 0.6s ease;
        }

        @keyframes greenbottomBubbles {
            0% {
                background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%,
                    70% -10%, 70% 0%;
            }

            50% {
                background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%,
                    105% 0%;
            }

            100% {
                background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%,
                    110% 10%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }

        /* Sign In */
        .signin {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .signin p {
            font-size: 14px;
            font-weight: 300;
        }

        .signin a {
            text-decoration: none;
            color: #4A9DEC;
        }
    </style>
</head>

<body>
    <?php if (isset($error)) : ?>
        <script>
            alert("username/password is wrong");
        </script>
    <?php endif; ?>


    <form action="" method="post">

        <div class="e-card playing">
            <div class="wave-container">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
            <div class="login-container">
                <h1 class="login-text" style="display: flex; justify-content:center;">LogIn</h1>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <br>
                <div class="rm-fp">
                    <label class="cl-checkbox" for="remember">
                        <input checked="" type="checkbox" name="remember" id="remember">
                        <span>RememberMe?</span>
                    </label>

                    <a href="">Forget Password?</a>
                </div>
                <div class="btn">
                    <button class="button" name="submit">LogIn</button>
                </div>

                <div class="signin">
                    <p>Don't have an account yet? <a href="signin.php">Sign Up</a></p>
                </div>
            </div>





        </div>
    </form>

</body>

</html>