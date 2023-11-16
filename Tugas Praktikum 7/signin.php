<?php
require 'function.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan!')
        </script>";
    } else {
        echo mysqli_error($conn);
    }
};
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
            text-decoration: none;
        }

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

        .back a {
            display: flex;
            margin-left: -4rem;
        }

        .login-container .checkbox {
            font-weight: 100;
        }

        .login-text {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        /* Input */
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
    </style>
</head>

<body>
    <form action="" method="post">

        <div class="e-card playing">
            <div class="wave-container">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
            <div class="login-container">
                <div class="back">
                    <a href="login.php">back</a>
                </div>
                <h1 class="login-text" style="display: flex; justify-content:center;">SignIn</h1>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <br><br>
                <label for="password2">Confirmation Password</label>
                <input type="password" name="password2" id="password2" required>
                <div class="btn">
                    <button class="button" name="register">Create Account!</button>
                </div>
            </div>
    </form>

</body>

</html>