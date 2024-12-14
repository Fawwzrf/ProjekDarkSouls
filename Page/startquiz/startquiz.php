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
</head>

<body>
    <div class="container">
        <h1 class="title">DARK SOULS</h1>
        <div class="border">
            <img class="border-img" src="../../Asset/Profile/border.png" alt="Border">
        </div>
        <div class="content">
            <div class="content-char">
                <img src="../../Asset/Profile/Foto Char.png" alt="Character">
            </div>
            <div class="content-main">
                <table>
                    <tr>
                        <td><img src="../../Asset/Register login/mahkota.png" alt="Mahkota"></td>
                        <td>
                            <p id="username"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="../../Asset/Register login/tameng.png" alt="Tameng"></td>
                        <td>
                            <p id="email"><?php echo htmlspecialchars($_SESSION['email']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btnstart">Start Quiz</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <audio id="button-sound" src="../../Asset/Video&Font/sound start.mp3"></audio>

    <!-- Tambahkan script di sini -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttonSound = document.getElementById('button-sound');

            document.querySelector('.btnstart').addEventListener('click', () => {
                const container = document.querySelector('.container');
                buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
                container.classList.add('fade-out');

                setTimeout(() => {
                    window.location.href = '../quiz/quiz.php';
                }, 2000); 
            });
        });
    </script>
</body>

</html>