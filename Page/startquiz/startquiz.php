<?php
session_start();
include('../../koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    <link rel="stylesheet" href="startstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Quintessential&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>DARK SOULS</h1>
        <div class="border">
            <img class="border-img" src="../../Asset/Profile/border.png" alt="">
            <img class="border-profil" src="../../Asset/Profile/Profile.png" alt="">
        </div>
        <div class="content">
            <div class="content-char">
                <img src="../../Asset/Profile/Foto Char.png" alt="">
            </div>
            <div class="content-main">
                <table>
                    <tr>
                        <td><img src="../../Asset/Register login/mahkota.png" alt=""></td>
                        <td><p id="username"><?php echo htmlspecialchars($_SESSION['username']); ?></p></td>
                    </tr>
                    <tr>
                        <td><img src="../../Asset/Register login/tameng.png" alt=""></td>
                        <td><p id="email"><?php echo htmlspecialchars($_SESSION['email']); ?></p></td>
                    </tr>
                    <tr>
                        <td><button class="btnstart" onclick="location.href='../quiz/quiz.php'">Start Quiz</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>