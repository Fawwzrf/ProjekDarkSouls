<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Starting Page</title>
</head>

<body>
    <div class="container fade-in">
        <div class="title-box">
            <h1>DARK SOULS</h1>
            <h3>COVENANT TEST</h3>
            <button class="press" id="press-button">PRESS TO LOGIN</button>
        </div>
    </div>

    <!-- Tambahkan elemen audio -->
    <audio id="button-sound" src="Asset/Video&Font/sound start.mp3"></audio>

    <script>
        const button = document.getElementById('press-button');
        const buttonSound = document.getElementById('button-sound');

        button.addEventListener('click', () => {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));

            // Tambahkan kelas transisi keluar
            button.classList.add('fade-out');

            // Tunggu efek transisi selesai (0.8s) sebelum berpindah halaman
            setTimeout(() => {
                window.location.href = 'Page/login/login.php';
            }, 4000);
        });
    </script>
</body>

</html>